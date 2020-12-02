<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Site Vinyle</title>
    <link rel="icon" href="asset/vinyl.ico">
    <link rel="stylesheet" href="asset/CSS/table.css">
    <link rel="stylesheet" href="asset/CSS/button.css">
    <?php include_once("class/class_login.php"); ?>
    <?php include_once("model/start_bdd.php"); ?>
</head>
<body>
<?php
    session_start();
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        if (($user->permission == "Admin" || $user->permission == "User")) {
?>
<!-- partial -->
<?php
    $bdd = start_bdd();
?>
    <a class="display_home2" href="Home_page.php"> <img src="asset/accueil.svg" width="50" height="50"> </a>
    <center><h1>Liste de tous les vinyles</h1></center>
    <div class="buttons-container">
        <div class="container">
            <a href="view_all_vinyl.php?status=vinyl_name" class="button">Nom du vinyle</a>
        </div>
        <div class="container">
            <a href="view_all_vinyl.php?status=artist_name" class="button">Artiste</a>
        </div>
        <div class="container">
            <a href="view_all_vinyl.php?status=country" class="button">Pays de préssage</a>
        </div>
        <div class="container">
            <a href="view_all_vinyl.php?status=price" class="button">Prix</a>
        </div>
        <div class="container">
            <a href="view_all_vinyl.php?status=status" class="button">Etat</a>
        </div>
    </div>
    <?php
    $search_vinyl = $bdd->prepare('SELECT * FROM vinyl') or die(print_r($bdd->errorInfo()));
    $search_vinyl->execute();
    $i = 0;
    if (isset($_GET['status'])) {
        if ($_GET['status'] == "vinyl_name") {
            $search_vinyl = $bdd->prepare('SELECT * FROM vinyl ORDER BY vinyl_name') or die(print_r($bdd->errorInfo()));
        } else if ($_GET['status'] == "artist_name") {
            $search_vinyl = $bdd->prepare('SELECT * FROM vinyl ORDER BY artist_name') or die(print_r($bdd->errorInfo()));
        } else if ($_GET['status'] == "country") {
            $search_vinyl = $bdd->prepare('SELECT * FROM vinyl ORDER BY country') or die(print_r($bdd->errorInfo()));
        } else if ($_GET['status'] == "price") {
            $search_vinyl = $bdd->prepare('SELECT * FROM vinyl ORDER BY price') or die(print_r($bdd->errorInfo()));
        } else if ($_GET['status'] == "status") {
            $search_vinyl = $bdd->prepare('SELECT * FROM vinyl ORDER BY status') or die(print_r($bdd->errorInfo()));
        } else {
            $search_vinyl = $bdd->prepare('SELECT * FROM vinyl') or die(print_r($bdd->errorInfo()));
        }
        $search_vinyl->execute();
    }
    ?>
    <table class="rwd-table">
        <tr>
            <th>Nom du vinyle</th>
            <th>Artiste</th>
            <th>Pays de préssage</th>
            <th>Prix</th>
            <th>Etat</th>
            <th>Spécificité</th>
        </tr>
    <?php
    while ($data = $search_vinyl->fetch()) {
    ?>
        <tr>
            <td data-th="Nom du vinyle"><?php echo $data['vinyl_name'];?></td>
            <td data-th="Artiste"><?php echo $data['artist_name'];?></td>
            <td data-th="Pays de préssage"><?php echo $data['Country'];?></td>
            <td data-th="Prix"><?php echo $data['price'];?></td>
            <td data-th="Etat"><?php echo $data['status'];?></td>
            <td data-th="Spécificité"><?php echo $data['specificity'];?></td>
        </tr>
    <?php
} ?>
</table>
</body>
</html>
<?php 
    }
}
?>