document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('searchForm');
    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Empêche le rechargement de la page

        const query = document.getElementById('searchInput').value;
        if (query.trim() === '') {
            document.getElementById('results').innerHTML = '<p>Veuillez entrer un terme de recherche.</p>';
            return;
        }

        fetch(`./search_recipes.php?q=${encodeURIComponent(query)}`)
            .then(response => response.json())
            .then(data => {
                const resultsContainer = document.getElementById('results');
                resultsContainer.innerHTML = '';

                if (data.length > 0) {
                    data.forEach(recipe => {
                        const recipeDiv = document.createElement('div');
                        recipeDiv.innerHTML = `
                            <h3>${recipe.titre}</h3>
                            <p>${recipe.instructions}</p>
                            <a href="une_recette.php?id=${recipe.id}" class="btn">Voir la recette complète</a>
                        `;
                        resultsContainer.appendChild(recipeDiv);
                    });
                } else {
                    resultsContainer.innerHTML = '<p>Aucune recette trouvée.</p>';
                }
            })
            .catch(error => {
                console.error('Erreur:', error);
                document.getElementById('results').innerHTML = '<p>Une erreur est survenue. Veuillez réessayer plus tard.</p>';
            });
    });
});
