<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Site Vinyle</title>
    <link rel="icon" href="asset/vinyl.ico">
    <link rel="stylesheet" href="asset/CSS/form_add_delate_vinyl.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="asset/CSS/table.css">
    <?php include_once("model/search_request.php") ?>
    <?php include_once("class/class_login.php"); ?>
</head>
<body>
<?php
    session_start();
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        if (($user->permission == "Admin" || $user->permission == "User")) {
?>
<a class="display_home2" href="Home_page.php"> <img src="asset/accueil.svg" width="50" height="50"> </a>
<div class="container">
    <form id="contact" action="search_vinyl.php" method="post">
    <center><h3>Rechercher un vinyle</h3>
        <h4>Veuillez remplir le formulaire pour rechercher un vinyle</h4> </center>
        <fieldset>
            <input placeholder="Le nom de l'album" name="vinyl_name" type="text" value="<?php echo isset($_POST['vinyle_name'])?htmlentities($_POST['vinyle_name'],ENT_QUOTES,"UTF-8"):''; ?>">
        </fieldset>
        <fieldset>
            <input placeholder="Le nom de l'artiste" name="artist_name" type="text" value="<?php echo isset($_POST['artist_name'])?htmlentities($_POST['artist_name'],ENT_QUOTES,"UTF-8"):''; ?>">
        </fieldset>
        <fieldset>
            <button name="submit" type="submit" id="contact-submit">Rechercher un vinyle</button>
        </fieldset>
    </form>
</div>
<!-- partial -->
  
</body>
</html>
<?php
    }
}
?>