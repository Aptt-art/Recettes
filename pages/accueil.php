<!DOCTYPE html>
<html lang="fr">

<?php include('./includes/head.html'); ?>
<title>Bienvenue sur Marmifion</title>
</head>

<body>

    <?php include('./includes/header.html'); ?>

    <main>
        <h1>Bienvenue sur Marmifion 🍔🍑 </h1>

        <p>Découvrez nos recettes exclusives !</p>

        <form class="search-bar" id="searchForm">
            <input type="text" id="searchInput" placeholder="Rechercher une recette...">
            <button type="submit">Rechercher</button>
        </form>

        <div id="results"></div>
    </main>

    <?php include('./includes/footer.html'); ?>

    <!-- Inclusion du script JavaScript externe -->
    <script src="../js/script.js"></script>
</body>

</html>