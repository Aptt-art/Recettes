<?php
require("./db/connexion.php");

$query = isset($_GET['q']) ? $_GET['q'] : '';
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 4; // Nombre de recettes par page
$offset = ($page - 1) * $limit;

if (empty($query)) {
    echo json_encode([]);  // Si la recherche est vide, retourner un tableau vide
    exit;
}

// Requête SQL pour la recherche avec insensibilité à la casse
$sql = "
    SELECT r.id_recette, r.nom_recette, r.instructions, p.chemin AS image_url
    FROM recettes r
    LEFT JOIN photos p ON r.id_recette = p.id_recette
    WHERE LOWER(r.nom_recette) LIKE :query
    LIMIT :limit OFFSET :offset
";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':query', '%' . strtolower($query) . '%', PDO::PARAM_STR); // Recherche insensible à la casse
$stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);

try {
    $stmt->execute();
    $recettes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Compter le nombre total de résultats
    $countQuery = "SELECT COUNT(*) FROM recettes WHERE LOWER(nom_recette) LIKE :query";
    $countStmt = $pdo->prepare($countQuery);
    $countStmt->bindValue(':query', '%' . strtolower($query) . '%', PDO::PARAM_STR);
    $countStmt->execute();
    $totalRecettes = $countStmt->fetchColumn();
    $totalPages = ceil($totalRecettes / $limit);

    // Retourner les résultats sous forme JSON, y compris la pagination
    echo json_encode([
        'recettes' => $recettes,
        'totalPages' => $totalPages,
        'currentPage' => $page
    ]);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Une erreur est survenue lors de la recherche.']);
}
?>
