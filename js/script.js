document.addEventListener('DOMContentLoaded', function() {
    let currentPage = 1;  // Initialiser la page actuelle
    let totalPages = 1;   // Initialiser le nombre de pages

    const form = document.getElementById('searchForm');
    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Empêche le rechargement de la page

        const query = document.getElementById('searchInput').value;
        if (query.trim() === '') {
            document.getElementById('results').innerHTML = '<p>Veuillez entrer un terme de recherche.</p>';
            return;
        }

        currentPage = 1; // Réinitialiser la page actuelle à 1 lorsqu'une nouvelle recherche est effectuée

        fetchResults(query, currentPage); // Appeler la fonction de recherche avec la première page
    });

    // Fonction pour charger les recettes via AJAX
    function fetchResults(query, page) {
        fetch(`./search_recipes.php?q=${encodeURIComponent(query)}&page=${page}`)
            .then(response => response.json())
            .then(data => {
                const resultsContainer = document.getElementById('results');
                resultsContainer.innerHTML = '';

                if (data.error) {
                    resultsContainer.innerHTML = '<p>' + data.error + '</p>';
                    return;
                }

                if (data.recettes.length > 0) {
                    data.recettes.forEach(recipe => {
                        const recipeDiv = document.createElement('div');
                        recipeDiv.innerHTML = `
                            <h3>${recipe.nom_recette}</h3>
                            <p>${recipe.instructions}</p>
                            <a href="une_recette.php?id=${recipe.id_recette}" class="btn">Voir la recette complète</a>
                        `;
                        resultsContainer.appendChild(recipeDiv);
                    });

                    totalPages = data.totalPages; // Mettre à jour le nombre total de pages
                    updatePagination(page); // Mettre à jour la pagination
                } else {
                    resultsContainer.innerHTML = '<p>Aucune recette trouvée.</p>';
                }
            })
            .catch(error => {
                console.error('Erreur:', error);
                document.getElementById('results').innerHTML = '<p>Une erreur est survenue. Veuillez réessayer plus tard.</p>';
            });
    }

    // Mettre à jour la pagination
    function updatePagination(page) {
        const paginationContainer = document.getElementById('pagination');
        paginationContainer.innerHTML = '';

        const prevPageLink = document.createElement('a');
        prevPageLink.classList.add('pagination-link');
        prevPageLink.href = '#';
        prevPageLink.textContent = 'Précédent';
        prevPageLink.onclick = function() {
            if (currentPage > 1) {
                currentPage--;
                fetchResults(document.getElementById('searchInput').value, currentPage);
            }
        };
        paginationContainer.appendChild(prevPageLink);

        const nextPageLink = document.createElement('a');
        nextPageLink.classList.add('pagination-link');
        nextPageLink.href = '#';
        nextPageLink.textContent = 'Suivant';
        nextPageLink.onclick = function() {
            if (currentPage < totalPages) {
                currentPage++;
                fetchResults(document.getElementById('searchInput').value, currentPage);
            }
        };
        paginationContainer.appendChild(nextPageLink);

        // Afficher les liens si la page actuelle est plus petite que le nombre total de pages
        prevPageLink.style.display = (currentPage > 1) ? 'inline-block' : 'none';
        nextPageLink.style.display = (currentPage < totalPages) ? 'inline-block' : 'none';
    }
});
