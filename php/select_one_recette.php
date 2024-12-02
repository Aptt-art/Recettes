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
    <h1 class="recipe-title"><?php echo htmlspecialchars($recette['nom']); ?></h1>
    <p class="recipe-origin"><strong>Types:</strong> <?php echo htmlspecialchars($recette['id_types_aliments']); ?></p>
    <p class="recipe-time"><strong>Temps de préparation:</strong> <?php echo htmlspecialchars($recette['temps_préparation']); ?> minutes</p>
    <div class="recipe-description">
        <h2>Description</h2>
        <p><?php echo nl2br(htmlspecialchars($recette['id_instruction'])); ?></p>
    </div>
    <a href="Recettes" class="lien_card_recette">chercher d'autres recettes</a>
</div>

<?php
} else {
    echo "<p>Recette introuvable.</p>";
}
?>
