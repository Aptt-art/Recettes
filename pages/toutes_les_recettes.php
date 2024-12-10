<!DOCTYPE html>
<html lang="fr">
<?php include './includes/head.html'; ?>
<title>Liste des Recettes</title>

<body>

    <?php include('./includes/header.html'); ?>
    <?php require('./php/select_all_recettes.php'); ?>

<main>
    <h1 class="dancing-script" style="font-size: 1.5rem;">Recettes Populaires en ce moment :</h1>

    <form id="searchForm" action="./php/select_one_recette.php" method="GET">
        <input type="text" id="searchInput" name="search" class="dancing-script" style="font-size: 1.5rem" placeholder="Rechercher une recette..." required>
        <button type="submit" id="searchButton">
            <i class="fas fa-search"></i>
        </button>
    </form>

    <div id="results">
        <!-- Les résultats de recherche seront affichés ici -->
    </div>

    <div id="pagination">
        <!-- Les liens de pagination seront injectés ici -->
    </div>

    <br><br>

    <?php if (!empty($recettes)): ?>
        <div class="recipe-grid">
            <?php foreach ($recettes as $recette): ?>
                <div class="recipe-card">
                    
                    <a href="recettes/<?php echo $recette['id_recette']; ?>">
                        <h2><?php echo htmlspecialchars($recette['nom_recette']); ?></h2>

                        <?php if ($recette['image_url']): ?>
                            <img src="<?php echo htmlspecialchars($recette['image_url']); ?>" alt="Image de <?php echo htmlspecialchars($recette['nom_recette']); ?>">
                        <?php endif; ?>

                        <p><strong>Ingrédients:</strong> <?php echo nl2br(htmlspecialchars($recette['ingredients'] ?? '')); ?></p>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>

        
    <?php else: ?>
        <p>Aucune recette disponible pour cette catégorie.</p>
    <?php endif; ?>
</main>
<script>
    // Sélection du formulaire et de l'input
    const searchForm = document.getElementById('searchForm');
    const searchInput = document.getElementById('searchInput');

    searchForm.addEventListener('submit', function (e) {
        e.preventDefault(); // Empêche le rechargement de la page par défaut

        const searchQuery = searchInput.value.trim(); // Récupère la valeur de l'input
        if (searchQuery === '') {
            alert('Veuillez entrer une recette à rechercher.');
            return;
        }

        // Redirige vers la page de sélection avec le paramètre de recherche
       
    });
</script>


<?php include('./includes/footer.html'); ?>
</body>

</html>
