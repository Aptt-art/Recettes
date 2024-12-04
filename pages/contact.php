<!DOCTYPE html>
<html lang="fr">
<?php include './includes/head.html'; ?>
<title>Contact</title>
<link rel="stylesheet" href=".\css\style.css">

<body>
    <?php include('./includes/header.html'); ?>

    <main>
        <h1>Contactez-nous</h1>

        <div class="contact-form-container">
            <form class="contact-form" action="submit_form.php" method="POST">
                <input type="text" name="nom" placeholder="Nom" required>
                <input type="email" name="email" placeholder="Email" required>
                <textarea name="message" placeholder="Votre message" rows="4" required></textarea>
                <button type="submit">Envoyer</button>
            </form>
        </div>
    </main>

    <?php include('./includes/footer.html'); ?>
</body>
</html>
