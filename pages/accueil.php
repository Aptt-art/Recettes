<!DOCTYPE html>
<html lang="fr">

<?php include('./includes/head.html'); ?>
<title>Bienvenue sur Marmifion</title>
<link rel="stylesheet" href=".\css\style.css">
</head>

<body>
<?php include('./includes/header.html'); ?>
    <form class="search-bar" id="searchForm" action="index.php" method="get">
            <input type="text" id="searchInput" name="search" placeholder="Rechercher une recette...">
            <button type="submit">Rechercher</button>
        </form>

        <div id="results"></div>

    <main>
        <h1 class="dancing-script">Bienvenue sur Marmifion 🍔🍑</h1>

        <p class="dancing-script" style="font-size: 2rem";> Découvrez nos recettes exclusives !</p>
        <div id="results"></div>
    </main>

    <?php include('./includes/footer.html'); ?>

    <!-- Inclusion du script JavaScript externe -->
    <script src="./js/script.js"></script>
</body>

</html>
