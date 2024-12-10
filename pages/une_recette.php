<!DOCTYPE html>
<html lang="fr">
<?php include('./includes/head.html'); ?>


<body>
    <?php include('./includes/header.html'); ?>

    <main>
        <div class="recette-container">
            <h1 class="dancing-script"><?php echo htmlspecialchars($recette['nom_recette']); ?></h1>

            <?php if (!empty($recette['image_url'])): ?>
                <div class="recette-image">
                    <img src="<?php echo htmlspecialchars($recette['image_url']); ?>" alt="Image de la recette">
                </div>
            <?php endif; ?>

            <div class="ingredients">
                <h2>Ingrédients :</h2>
                <p><?php echo htmlspecialchars($recette['ingredients']); ?></p>
            </div>

            <div class="categorie">
                <h2>Catégorie :</h2>
                <p><?php echo htmlspecialchars($recette['nom']); ?></p>
            </div>

            <?php if (!empty($recette['types_aliments'])): ?>
                <div class="types-aliments">
                    <h2>Types d'aliments :</h2>
                    <p><?php echo htmlspecialchars($recette['types_aliments']); ?></p>
                </div>
            <?php endif; ?>

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