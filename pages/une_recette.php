<!DOCTYPE html>
<html lang="fr">
<?php include './includes/header.html'; ?>
<?php include('./includes/head.html'); ?>

<title><?= htmlspecialchars($recette['nom_recette'] ?? 'Recette inconnue') ?></title>
</head>

<body>
    
    <h1><?= htmlspecialchars($recette['nom_recette'] ?? 'Recette inconnue') ?></h1>
    <section id="instructions">
        <h2>Instructions</h2>
        <p><?= htmlspecialchars($recette['id_instructions'] ?? 'Aucune instruction') ?></p>
    </section>
    <section id="ingredients">
        <h2>Ingrédients</h2>
        <ul>
            <?php if (isset($recette['id_ingredient'])) : ?>
                <?php foreach ($recette['id_ingredient'] as $ingredient) : ?>
                    <li><?= htmlspecialchars($ingredient) ?></li>
                <?php endforeach; ?>
            <?php else : ?>
                <p>Aucun ingrédient</p>
            <?php endif; ?>
        </ul>
    </section>
    <?php include './includes/footer.html'; ?>
</body>
</html>