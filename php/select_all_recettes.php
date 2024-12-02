<?php
// Exemple de code pour récupérer une recette spécifique


if (isset($_GET['id'])) {
    $id_recette = $_GET['id'];
    $sql = "SELECT * FROM recettes WHERE id_recette = :id_recette";
    $query = $pdo->prepare($sql);
    $query->execute([':id_recette' => $id_recette]);
    $data = $query->fetch();

    if ($data) {
        $nomRecette = htmlspecialchars($data['nom_recette']);
        echo "<h1>$nomRecette</h1>";
        echo "<p>" . nl2br(htmlspecialchars($data['description'])) . "</p>";
    } else {
        include(__DIR__ . './erreur404.php');
    }
} else {
    include(__DIR__ . './erreur404.php');
}


?>
