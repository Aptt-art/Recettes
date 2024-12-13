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
    <div class="login-container">
        <h1>Connexion à Mon Site de Cuisine</h1>
        <form id="loginForm">
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" placeholder="Entrez votre email" required>

            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe" required>

            <button type="submit" id="loginButton">Se connecter</button>
            <p id="error-message" class="error"></p>
        </form>
    </div> 

    <?php include('./includes/footer.html'); ?>

    <!-- Inclusion du script JavaScript externe -->
    <script src="./js/script.js"></script>
</body>

</html>
