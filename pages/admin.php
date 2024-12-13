<?php

require('./Recettes/db/connexion.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include('./includes/head.html'); ?>
    <title>Admin - Gestion des Recettes</title>
</head>
<body>
    <?php include('./includes/header.html'); ?>
    <main>
        <h1>Administration - Gestion des Recettes</h1>
        <section>
            <h2>Ajouter une recette</h2>
            <form action="add_recipe.php" method="POST">
                <label for="nom">Nom de la recette :</label>
                <input type="text" id="nom" name="nom" required>

                <label for="ingredients">Ingrédients :</label>
                <textarea name="ingredients" id="ingredients" rows="5" required></textarea>

                <button type="submit">Ajouter</button>
            </form>
        </section>

        <section>
            <h2>Supprimer une recette</h2>
            <form action="delete_recipe.php" method="POST">
                <label for="id_recette">ID de la recette :</label>
                <input type="number" id="id_recette" name="id_recette" required>
                <button type="submit">Supprimer</button>
            </form>
        </section>
    </main>
    <?php include('./includes/footer.html'); ?>
</body>
</html>
