<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Site Vinyle</title>
    <link rel="icon" href="asset/vinyl.ico">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="asset/CSS/table.css">
    <link rel="stylesheet" href="asset/CSS/button.css">
    <?php include_once("class/class_login.php"); ?>
</head>
<body>
<a class="display_home2" href="Home_page.php"> <img src="asset/accueil.svg" width="50" height="50"> </a>
<center><h1>Wishlist</h1></center>
<?php
    session_start();
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        if ($user->permission == "Admin" || $user->permission == "User") {
            include_once("model/wishlist_request.php")
        ?>
        
</body>
</html>
<?php
    }
}
?>