<?php
require("db/connexion.php");

$id_recette = $id_recette_demande;

if ($id_recette <= 0) {
    echo "Recette invalide.";
    exit;
}

$query = "
    SELECT 
        r.nom_recette, c.nom, 
        GROUP_CONCAT(DISTINCT i.nom_ingredients ORDER BY i.nom_ingredients SEPARATOR ', ') AS ingredients,
        GROUP_CONCAT(DISTINCT t.nom_aliment ORDER BY t.nom_aliment SEPARATOR ', ') AS types_aliments,
        p.chemin AS image_url
    FROM recettes r
    LEFT JOIN ingredients_recettes ir ON r.id_recette = ir.id_recette
    LEFT JOIN ingredients i ON ir.id_ingredient = i.id_ingredient
    LEFT JOIN types_aliments t ON r.id_types_aliments = t.id_aliment
    LEFT JOIN photos p ON r.id_recette = p.id_recette
    LEFT JOIN categories c ON r.id_catg = c.id_catg
    WHERE r.id_recette = :id_recette
    GROUP BY r.id_recette, p.chemin";

$stmt = $pdo->prepare($query);
$stmt->bindParam(':id_recette', $id_recette, PDO::PARAM_INT);

try {
    $stmt->execute();
    $recette = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$recette) {
        echo "Aucune recette trouvée pour cet ID.";
        exit;
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($recette['nom_recette']); ?></title>
    <?php include('./includes/head.html'); ?>
    <link rel="stylesheet" href="style.css">
</head>

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
