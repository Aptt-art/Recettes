
<?php
include('./includes/header.html');
include('./db/connexion.php');

try {
    $query = "SELECT * FROM recettes";
    $stmt = $pdo->query($query);
    $recettes = $stmt->fetchAll();
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
    exit();
}


?>
<main>
    <h1>Liste des Recettes</h1>
    <?php if (!empty($recettes)): ?>
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
