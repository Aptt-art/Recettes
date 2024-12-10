<?php
include('./db/connexion.php'); // Connexion à la base de données

// Vérification de l'existence du paramètre de recherche
session_start(); // Démarre la session
$recette_id = $_SESSION['recette_id']; // Récupère l'ID de la recce
// Si un terme de recherche est passé, effectuer la recherche

    // Préparer la requête SQL pour chercher une recette par son nom
    $query = "SELECT * FROM recettes WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':id' => $recette_id]);

    // Récupérer les résultats
    $recette = $stmt->fetch(PDO::FETCH_ASSOC);

    // Si une recette a été trouvée
    if ($recette) {
        // Rediriger vers une_recette.php en passant l'ID de la recette
        header("Location: une_recette.php/" . $recette['id_recette']);
        exit();
    } else {
        echo "<p>Recette introuvable.</p>";
    }
