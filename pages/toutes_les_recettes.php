<?php
include $_SERVER['DOCUMENT_ROOT'] . '/projets/testphp/cuisinefichierpropre/db/connexion.php';


$query = "SELECT * FROM recettes";
$stmt = $pdo->query($query);
$recettes = $stmt->fetchAll();

include('./includes/header.html');
?>

<main>
    <h1>Liste des Recettes</h1>
    <?php if (count($recettes) > 0): ?>
        <ul>
            <?php foreach ($recettes as $recette): ?>
                <li><a href='recettes/<?php echo $recette['id_recette']; ?>'><?php echo htmlspecialchars($recette['nom_recette']); ?></a></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Aucune recette disponible.</p>
    <?php endif; ?>
</main>

<?php include('./includes/footer.html'); ?>