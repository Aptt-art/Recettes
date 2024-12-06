<!DOCTYPE html>
<html lang="fr">
<?php include('./includes/head.html'); ?>
<title><?= htmlspecialchars($recette['nom_recette'] ?? 'Recette inconnue') ?></title>
</head>

<body>

<?php include './includes/header.html'; ?>
    <h1><?= htmlspecialchars($recettes['nom_recette'] ?? 'Recette inconnue') ?></h1>
    <p><?= htmlspecialchars($recettes['id_instructions'] ?? 'Aucune instruction') ?></p>
    <p>Ingrédients : <?= htmlspecialchars($recette['id_ingredient'] ?? 'Aucun ingrédient') ?></p>
  
    <section id="ingredients">
     
        
                
        </section>
            <?php include './includes/footer.html'; ?>
        </body>
        </html>
