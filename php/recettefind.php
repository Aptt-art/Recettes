<?php
 include './includes/header.html'; 
// Inclure le fichier de connexion à la base de données
require('./db/connexion.php');

// Vérifier si une requête de recherche est soumise
if (isset($_GET['q']) && !empty($_GET['q'])) {
    $searchTerm = htmlspecialchars($_GET['q']); // Sécuriser la saisie utilisateur

    // Requête SQL pour rechercher des recettes
    $query = "SELECT * FROM recettes WHERE titre LIKE :searchTerm OR description LIKE :searchTerm";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['searchTerm' => '%' . $searchTerm . '%']);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Retourner les résultats au format JSON
    header('Content-Type: application/json');
    echo json_encode($results);
} else {
    // Si aucune recherche n'est soumise, renvoyer une réponse vide
    echo json_encode([]);
}
?>
