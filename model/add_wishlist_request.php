<?php
include_once("./class/class_vinyl.php");
include_once("start_bdd.php");

$bdd = start_bdd();
if (isset($_POST['submit'])) {
    $check_vinyl_name = vinyl::check_string($vinyl_name = htmlspecialchars($_POST["vinyl_name"]));
    $check_artist_name = vinyl::check_string($artist_name = htmlspecialchars($_POST["artist_name"]));
    $check_specificity = vinyl::check_string($specificity = htmlspecialchars($_POST["specificity"]));
    if (!$check_vinyl_name)
        echo '<script type="text/javascript">alert("Le nom du vinyle ne peut être ajouté car vous utilisez un caractère spéciale.")</script>';
    else if (!$check_artist_name)
        echo '<script type="text/javascript">alert("Cet artiste/Groupe ne peut être ajouté car vous utilisez un caractère spéciale.")</script>';
    else if (!$check_specificity)
        echo '<script type="text/javascript">alert("Cette spécificité ne peut être ajouté car vous utilisez un caractère spéciale.")</script>';
    else {
        if ($specificity == NULL)
            $specificity = "Rien";
        $search_vinyl = $bdd->prepare('SELECT vinyl_name, artist_name FROM wishlist WHERE vinyl_name = :vinyl_name AND artist_name = :artist_name') or die(print_r($bdd->errorInfo()));
        $search_vinyl->bindValue(":vinyl_name", $vinyl_name);
        $search_vinyl->bindValue(":artist_name", $artist_name);
        $search_vinyl->execute();
        $valid_vinyl = true;

        while ($data = $search_vinyl->fetch()) {
            if ($data["vinyl_name"] == $vinyl_name AND $data["artist_name"] == $artist_name)
                $valid_vinyl = false;
        }
        $search_vinyl->closeCursor();
        if (!$valid_vinyl)
            echo '<script type="text/javascript">alert("Ce vinyle existe déjà.")</script>';
        else {
            $add_vinyl = $bdd->prepare('INSERT INTO wishlist(vinyl_name, artist_name, specificity) VALUES(:vinyl_name, :artist_name, :specificity)');
            $add_vinyl->execute(array(
                'vinyl_name' => $vinyl_name,
                'artist_name' => $artist_name,
                'specificity' => $specificity,
            ));
            $add_vinyl->closeCursor();
            echo '<script type="text/javascript">alert("Vous avez bien ajouter un nouveau vinyle à la wishlist.")</script>';
        }
    }
}