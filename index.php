<!DOCTYPE html>
<html lang="fr" >
<head>
    <meta charset="UTF-8">
    <title>Site Vinyle</title>
    <link rel="icon" href="asset/vinyl.ico">
    <link rel="stylesheet" href="asset/CSS/style.css">
    <?php include_once("model/login.php") ?>
</head>
<body>
<!-- partial:index.partial.html -->
<div class="login-page">
    <div class="form">
        <form class="register-form" action="index.php" method="post">
            <input type="text" name="first_name" placeholder="Prénom" required value="<?php echo isset($_POST['first_name'])?htmlentities($_POST['first_name'],ENT_QUOTES,"UTF-8"):''; ?>">
            <input type="text" name="last_name" placeholder="Nom" required value="<?php echo isset($_POST['last_name'])?htmlentities($_POST['last_name'],ENT_QUOTES,"UTF-8"):''; ?>">
            <input type="text" name="username_s" placeholder="Identifiant" required value="<?php echo isset($_POST['username'])?htmlentities($_POST['username'],ENT_QUOTES,"UTF-8"):''; ?>">
            <input type="password" name="password_s" placeholder="Mot de passe" required value="<?php echo isset($_POST['password'])?htmlentities($_POST['password'],ENT_QUOTES,"UTF-8"):''; ?>">
            <button type="submit" name="sign_in">S'inscrire</button>
            <p class="message">Vous êtes déjà inscrit <a href="#">Connectez-vous</a></p>
        </form>
        <form class="login-form" action="index.php" method="post">
            <input type="text" name="username_l" placeholder="Identifiant" required value="<?php echo isset($_POST['username'])?htmlentities($_POST['username'],ENT_QUOTES,"UTF-8"):''; ?>">
            <input type="password" name="password_l" placeholder="Mot de passe" required value="<?php echo isset($_POST['password'])?htmlentities($_POST['password'],ENT_QUOTES,"UTF-8"):''; ?>">
            <button type="submit" name="login">Se connecter</button>
            <p class="message">Vous n'êtes pas inscrit ? <a href="#">Inscrivez-vous</a></p>
        </form>
    </div>
</div>
<!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="asset/JS/script.js"></script>

</body>
</html>
