<?php
include './db/connexion.php';

$searchTerm = $_GET['q']; // Récupérer le terme de recherche

// Préparer la requête SQL pour récupérer les recettes correspondant au terme de recherche
$query = "SELECT * FROM recettes WHERE nom_recette LIKE :searchTerm";
$stmt = $pdo->prepare($query);
$stmt->execute([':searchTerm' => "%$searchTerm%"]);

// Récupérer les résultats
$recettes = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($recettes) {
    foreach ($recettes as $recette) {
        echo "<h2>" . htmlspecialchars($recette['nom_recette']) . "</h2>";
        // Vous pouvez également afficher d'autres informations sur la recette
    }
} else {
    echo "<p>Aucune recette trouvée pour ce terme.</p>";
}
?>
