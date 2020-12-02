<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Site Vinyle</title>
    <link rel="icon" href="asset/vinyl.ico">
    <link rel="stylesheet" href="asset/CSS/form_add_delate_vinyl.css">
    <?php include_once("model/add_request.php") ?>
    <?php include_once("class/class_login.php"); ?>
</head>
<body>
<?php
    session_start();
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        if ($user->permission == "Admin") {
?>
<a class="display_home" href="Home_page.php"> <img src="asset/accueil.svg" width="50" height="50"> </a>
<div class="container">
    <form id="contact" action="add_vinyl.php" method="post">
    <center><h3>Ajouter un vinyle</h3>
        <h4>Veuillez remplir le formulaire pour ajouter un vinyle</h4> </center>
        <fieldset>
            <input placeholder="Le nom de l'album" name="vinyl_name" type="text" required value="<?php echo isset($_POST['vinyle_name'])?htmlentities($_POST['vinyle_name'],ENT_QUOTES,"UTF-8"):''; ?>">
        </fieldset>
        <fieldset>
            <input placeholder="Le nom de l'artiste" name="artist_name" type="text" required value="<?php echo isset($_POST['artist_name'])?htmlentities($_POST['artist_name'],ENT_QUOTES,"UTF-8"):''; ?>">
        </fieldset>
        <fieldset>
            <input placeholder="Le pays de pressage du vinyle" name="country" type="text" required value="<?php echo isset($_POST['country'])?htmlentities($_POST['country'],ENT_QUOTES,"UTF-8"):''; ?>">
        </fieldset>
        <fieldset>
            <input placeholder="Le prix du vinyle" name="price" type="text" required value="<?php echo isset($_POST['price'])?htmlentities($_POST['price'],ENT_QUOTES,"UTF-8"):''; ?>">
        </fieldset>
        <fieldset>
            <input placeholder="Etat du vinyle" name="status" type="text" required value="<?php echo isset($_POST['status'])?htmlentities($_POST['status'],ENT_QUOTES,"UTF-8"):''; ?>">
        </fieldset>
        <fieldset>
            <input placeholder="Spécificité du vinyle (pas obligatoire)" name="specificity" type="text" value="<?php echo isset($_POST['specificity'])?htmlentities($_POST['specificity'],ENT_QUOTES,"UTF-8"):''; ?>">
        </fieldset>
        <fieldset>
            <button name="submit" type="submit" id="contact-submit">Ajouter le vinyle</button>
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