<?php
include_once("./class/class_vinyl.php");
include_once("start_bdd.php");

$bdd = start_bdd();
if (isset($_POST['submit'])) {
    $check_vinyl_name = vinyl::check_string($vinyl_name = htmlspecialchars($_POST["vinyl_name"]));
    $check_artist_name = vinyl::check_string($artist_name = htmlspecialchars($_POST["artist_name"]));
    if (!$check_vinyl_name)
        echo '<script type="text/javascript">alert("Le nom du vinyle ne peut être ajouté car vous utilisez un caractère spéciale.")</script>';
    else if (!$check_artist_name)
        echo '<script type="text/javascript">alert("Cet artiste/Groupe ne peut être ajouté car vous utilisez un caractère spéciale.")</script>';
    else {
        $i = 0;
        $valid_vinyl = false;
        $search_vinyl = $bdd->prepare('SELECT vinyl_name, artist_name FROM wishlist WHERE vinyl_name = :vinyl_name AND artist_name = :artist_name') or die(print_r($bdd->errorInfo()));
        $search_vinyl->bindValue(":vinyl_name", $vinyl_name);
        $search_vinyl->bindValue(":artist_name", $artist_name);
        $search_vinyl->execute();
        while ($data = $search_vinyl->fetch()) {
            if ($data["vinyl_name"] == $vinyl_name AND $data["artist_name"] == $artist_name)
                $valid_vinyl = true;
        }
        $search_vinyl->closeCursor();
        if (!$valid_vinyl)
            echo '<script type="text/javascript">alert("Ce vinyle n\'existe pas dans la wishlist de François.")</script>';
        else {
            $delete_vinyl = $bdd->prepare('DELETE FROM wishlist WHERE vinyl_name = :vinyl_name AND artist_name = :artist_name') or die(print_r($bdd->errorInfo()));
            $delete_vinyl->bindValue(":vinyl_name", $vinyl_name);
            $delete_vinyl->bindValue(":artist_name", $artist_name);
            $delete_vinyl->execute();
            echo '<script type="text/javascript">alert("Le vinyle à été supprimé.")</script>';
        }
    }
}