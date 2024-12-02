<?php
$host = 'localhost';
$port = 3306;
$dbname = 'recette_aurelien';
$username = 'root';
$password = '';


    try {

        // Connexion à la base de données avec PDO
        $dsn = "mysql:host=$host;port=$port;dbname=$dbname;";
        $pdo = new PDO($dsn, $username, $password);

        // Configuration des attributs PDO
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);


    } catch (PDOException $e) {

        die("Erreur de connexion ou de requête : " . $e->getMessage());
        
    }

    // Fermeture de la connexion (automatique à la fin du script)

?>