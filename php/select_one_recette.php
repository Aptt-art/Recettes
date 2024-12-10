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
        p.chemin AS image_url,
        (
            SELECT GROUP_CONCAT(CONCAT(ordre, '. ', description) ORDER BY ordre ASC SEPARATOR '\n') 
            FROM instructions 
            WHERE instructions.id_recette = r.id_recette
        ) AS instructions
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
