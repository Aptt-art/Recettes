<?php require("./db/connexion.php");

// Récupérer le numéro de la page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 24; // Nombre de recettes par page
$offset = ($page - 1) * $limit;

$query = "
    SELECT 
        r.id_recette, 
        r.nom_recette,
        GROUP_CONCAT(i.nom_ingredients ORDER BY i.nom_ingredients SEPARATOR ', ') AS ingredients,
        p.chemin AS image_url
    FROM recettes r
    LEFT JOIN ingredients_recettes ir ON r.id_recette = ir.id_recette
    LEFT JOIN ingredients i ON ir.id_ingredient = i.id_ingredient
    LEFT JOIN photos p ON r.id_recette = p.id_recette
    GROUP BY r.id_recette
    ORDER BY r.nom_recette
    LIMIT :limit OFFSET :offset";

$stmt = $pdo->prepare($query);
$stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);

try {
    $stmt->execute();
    $recettes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

// Compter le total des recettes
$countQuery = "SELECT COUNT(*) FROM recettes";
$totalRecettes = $pdo->query($countQuery)->fetchColumn();
$totalPages = ceil($totalRecettes / $limit);
