<!DOCTYPE html>
<html lang="fr">
<?php include('./includes/head.html'); ?>

<body>
    <?php include('./includes/header.html'); ?>

    <main>
        <div class="recette-container">
            <!-- Titre de la recette -->
            <h1 class="dancing-script"><?php echo htmlspecialchars($recette['nom_recette']); ?></h1>

            <!-- Image de la recette -->
            <?php if (!empty($recette['image_url'])): ?>
                <div class="recette-image">
                    <img src="<?php echo htmlspecialchars($recette['image_url']); ?>" alt="Image de la recette">
                </div>
            <?php endif; ?>

            <!-- Ingrédients -->
            <div class="ingredients">
                <h2>Ingrédients :</h2>
                <p><?php echo nl2br(htmlspecialchars($recette['ingredients'])); ?></p>
            </div>

            <!-- Catégorie -->
            <div class="categorie">
                <h2>Catégorie :</h2>
                <p><?php echo htmlspecialchars($recette['nom']); ?></p>
            </div>

            <!-- Instructions de préparation -->
            <?php if (!empty($recette['instructions'])): ?>
                <div class="instructions">
                    <h2>Instructions de préparation :</h2>
                    <p><?php echo nl2br(htmlspecialchars($recette['instructions'])); ?></p>
                </div>
            <?php endif; ?>

            <!-- Boutons de partage -->
            <div class="share-buttons">
                <h2>Partagez cette recette :</h2>
                <a href="https://facebook.com" target="_blank" class="share-button">Facebook</a>
                <a href="https://twitter.com" target="_blank" class="share-button">Twitter</a>
                <a href="https://pinterest.com" target="_blank" class="share-button">Pinterest</a>
            </div>
        </div>
    </main>

    <?php include('./includes/footer.html'); ?>
</body>
</html>
