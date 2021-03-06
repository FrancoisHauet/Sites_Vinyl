<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Site Vinyle</title>
    <link rel="icon" href="asset/vinyl.ico">
    <link rel="stylesheet" href="asset/CSS/form_add_delate_vinyl.css">
    <?php include_once("model/delete_wishlist_request.php") ?>
    <?php include_once("class/class_login.php"); ?>
</head>
<body>
<?php
    session_start();
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        if ($user->permission == "Admin") {
?>
<div class="container">
    <form id="contact" action="delete_wishlist.php" method="post">
    <center><h3>Supprimer un vinyle de la wishlist</h3>
        <h4>Veuillez remplir le formulaire pour ajouter supprimer un vinyle de la wishlist</h4> </center>
        <fieldset>
            <input placeholder="Le nom de l'album" name="vinyl_name" type="text" required value="<?php echo isset($_POST['vinyle_name'])?htmlentities($_POST['vinyle_name'],ENT_QUOTES,"UTF-8"):''; ?>">
        </fieldset>
        <fieldset>
            <input placeholder="Le nom de l'artiste" name="artist_name" type="text" required value="<?php echo isset($_POST['artist_name'])?htmlentities($_POST['artist_name'],ENT_QUOTES,"UTF-8"):''; ?>">
        </fieldset>
        <fieldset>
            <button name="submit" type="submit" id="contact-submit">Supprimer un vinyle</button>
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