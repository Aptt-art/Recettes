
<?php
include('./db/connexion.php');

$id_recette_demande = (int) $id_recette_demande;

$query = "SELECT * FROM recettes WHERE id_recette = :id"; 
$stmt = $pdo->prepare($query);
$stmt->execute([':id' => $id_recette_demande]);

$recette = $stmt->fetch(PDO::FETCH_ASSOC);

if ($recette) {
    ?>
    <div class="recipe-container">
        <h1 class="recipe-title"><?= htmlspecialchars($recette['nom_recette']) ?></h1>
        <p class="recipe-origin"><strong>Types:</strong> <?= htmlspecialchars($recette['id_types_aliments']) ?></p>
        <p class="recipe-time"><strong>Temps de préparation:</strong> <?= htmlspecialchars($recette['temps_preparation']) ?> minutes</p>
        var_dump($)
        <div class="recipe-description">
            <h2>Description</h2>
            <p><?= nl2br(htmlspecialchars($recette['description'])) ?></p>
        </div>
        <a href="recettes" class="lien_card_recette">chercher d'autres recettes</a>
    </div>
    <?php
} else {
    echo "<p>Recette introuvable.</p>";
}
?>

