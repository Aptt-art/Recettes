<!DOCTYPE html>
<html lang="fr">
<?php include './includes/head.html'; ?>
<title>Liste des Recettes</title>
<link rel="stylesheet" href="./css/style.css">

<body>

    <?php include('./includes/header.html'); ?>
    <?php require('./php/select_all_recettes.php'); ?>

    </form>


    <main>
        <h1 class="dancing-script" style="font-size: 2rem" ;>Recettes Populaires en ce moment :</h1>
        <form id="searchForm">
            <form id="searchForm" action="./php/recettefind.php" method="GET">
                <input type="text" id="searchInput" name="route" class="dancing-script" style="font-size: 2rem" placeholder="Rechercher une recette..." required>
                <button type="submit" id="searchButton">
                    <i class="fas fa-search"></i>
                </button>
            </form>
            <div id="results">
                <!-- Les résultats seront affichés ici -->
            </div>

            <div id="pagination">
                <!-- Les liens de pagination seront injectés ici -->
            </div>
            <br><br>

            <?php if (!empty($recettes)): ?>
                <div class="recipe-grid">
                    <?php foreach ($recettes as $recette): ?>
                        <div class="recipe-card">
                            <a href="recette.php?id=<?php echo $recette['id_recette']; ?>">
                                <h2><?php echo htmlspecialchars($recette['nom_recette']); ?></h2>

                                <?php if ($recette['image_url']): ?>
                                    <img src="<?php echo htmlspecialchars($recette['image_url']); ?>" alt="Image de <?php echo htmlspecialchars($recette['nom_recette']); ?>">
                                <?php endif; ?>

                                <p><strong>Ingrédients:</strong> <?php echo nl2br(htmlspecialchars($recette['ingredients'] ?? '')); ?></p>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Pagination -->
                <div class="pagination">
                    <?php if ($page > 1): ?>
                        <a href="?page=<?php echo $page - 1; ?>">&laquo; Précédent</a>
                    <?php endif; ?>
                    <a href="?page=<?php echo $page + 1; ?>">Accueil &raquo;</a>
                </div>

            <?php else: ?>
                <p>Aucune recette disponible pour cette catégorie.</p>
            <?php endif; ?>
    </main>

    <?php include('./includes/footer.html'); ?>
</body>

</html>