<?php
require('./db/connexion.php');

// Vérifier si l'utilisateur est connecté et a le rôle 'user'
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
    // Si l'utilisateur n'est pas connecté ou n'a pas le rôle 'user', redirection vers la page de connexion
    header("Location: login.php");
    exit;
}

// Récupérer les informations de l'utilisateur depuis la session
$user_id = $_SESSION['user_id']; // ID utilisateur
$user_email = $_SESSION['user_email']; // Email utilisateur

// Optionnel : Récupérer le nom de l'utilisateur dans la base de données pour plus de détails
$query = "SELECT name FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $user_name = $user['name']; // Nom de l'utilisateur
} else {
    // Si l'utilisateur n'est pas trouvé, rediriger vers la page de connexion
    header("Location: login.php");
    exit;
}

$stmt->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include('./includes/head.html'); ?>
    <title>Page utilisateur - Bienvenue</title>
</head>
<body>
    <?php include('./includes/header.html'); ?>

    <main>
        <section class="welcome">
            <h1>Bienvenue, <?php echo htmlspecialchars($user_name); ?>!</h1>
            <p>Vous êtes connecté avec l'email : <?php echo htmlspecialchars($user_email); ?></p>
        </section>

        <section class="user-info">
            <h2>Informations sur votre compte</h2>
            <ul>
                <li><strong>Nom :</strong> <?php echo htmlspecialchars($user_name); ?></li>
                <li><strong>Email :</strong> <?php echo htmlspecialchars($user_email); ?></li>
                <li><strong>ID Utilisateur :</strong> <?php echo htmlspecialchars($user_id); ?></li>
            </ul>
        </section>

        <section class="user-actions">
            <h2>Actions possibles</h2>
            <ul>
                <li><a href="edit_profile.php">Modifier le profil</a></li>
                <li><a href="change_password.php">Changer le mot de passe</a></li>
            </ul>
        </section>
    </main>

    <?php include('./includes/footer.html'); ?>
</body>
</html>
