<?php
// Inclure la connexion à la base de données
require_once('C:/wamp64/www/projets/testphp/cuisinefichierpropre/Recettes/db/connexion.php');


// // Récupérer les données JSON envoyées par le formulaire via JavaScript
// $data = json_decode(file_get_contents("php://input"), true);

if (isset($_POST['email']) && isset($_POST['password'])) {
    // Sécuriser les données d'email et de mot de passe
    $email = $pdo->quote($data['email']);  // Utilisation de PDO pour échapper l'email
    $password = $_POST['password'];  // Le mot de passe sera vérifié avec password_verify

    // Préparer la requête SQL pour rechercher l'utilisateur
    $query = "SELECT id, email, password, role FROM users WHERE email = $email";
    
    try {
        $stmt = $pdo->query($query);  // Exécuter la requête SQL
        $user = $stmt->fetch();

        if ($user) {
            // Si l'utilisateur existe, vérifier le mot de passe
            if (password_verify($password, $user['password'])) {
                // Si le mot de passe est correct, démarrer la session
                http_response_code(200);
                 session_start(); 
                $_SESSION['role'] = $user['role'];
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email'];

                // Retourner un message de succès
                // echo json_encode(['success' => true, 'role' => $user['role']]);
            } else {
                // Mot de passe incorrect
               
                http_response_code(401);
            }
        } else {
            // Si l'utilisateur n'existe pas

            http_response_code(401);
        }
    } catch (PDOException $e) {
        // En cas d'erreur avec la requête SQL
      
        http_response_code(401);
    }
} else {
    // Si les données sont manquantes
   
    http_response_code(401);
}

// Fermeture de la connexion PDO (automatique à la fin du script)
?>


