<?php
include_once("./class/class_vinyl.php");
include_once("start_bdd.php");

$bdd = start_bdd();
if (isset($_POST['submit'])) {
    $check_vinyl_name = vinyl::check_string($vinyl_name = htmlspecialchars($_POST["vinyl_name"]));
    $check_artist_name = vinyl::check_string($artist_name = htmlspecialchars($_POST["artist_name"]));
    $check_country = vinyl::check_string($country = htmlspecialchars($_POST["country"]));
    $check_price = vinyl::check_string($price = htmlspecialchars($_POST["price"]));
    $check_status = vinyl::check_string($status = htmlspecialchars($_POST["status"]));
    $check_specificity = vinyl::check_string($specificity = htmlspecialchars($_POST["specificity"]));
    if (!$check_vinyl_name)
        echo '<script type="text/javascript">alert("Le nom du vinyle ne peut être ajouté car vous utilisez un caractère spéciale.")</script>';
    else if (!$check_artist_name)
        echo '<script type="text/javascript">alert("Cet artiste/Groupe ne peut être ajouté car vous utilisez un caractère spéciale.")</script>';
    else if (!$check_country)
        echo '<script type="text/javascript">alert("Ce pays ne peut être ajouté car vous utilisez un caractère spéciale.")</script>';
    else if (!$check_price)
        echo '<script type="text/javascript">alert("Le prix ne peut être ajouté car vous utilisez un caractère spéciale.")</script>';
    else if (!ctype_digit($_POST['price']))
        echo '<script type="text/javascript">alert("Veuillez mettre des chiffres et non des lettres pour le prix du vinyle.")</script>';
    else if (!$check_status)
        echo '<script type="text/javascript">alert("Vous ne pouvez pas rajouté un état car vous utilisez un caractère spéciale.")</script>';
    else if (!$check_specificity)
        echo '<script type="text/javascript">alert("Cette spécificité ne peut être ajouté car vous utilisez un caractère spéciale.")</script>';
    else {
        if ($specificity == NULL)
            $specificity = "Rien";
        $search_vinyl = $bdd->prepare('SELECT vinyl_name, artist_name, country FROM vinyl WHERE vinyl_name = :vinyl_name AND artist_name = :artist_name AND country = :country') or die(print_r($bdd->errorInfo()));
        $search_vinyl->bindValue(":vinyl_name", $vinyl_name);
        $search_vinyl->bindValue(":artist_name", $artist_name);
        $search_vinyl->bindValue(":country", $country);
        $search_vinyl->execute();
        $valid_vinyl = true;

        while ($data = $search_vinyl->fetch()) {
            if ($data["vinyl_name"] == $vinyl_name AND $data["artist_name"] == $artist_name AND $data["country"] == $country)
                $valid_vinyl = false;
        }
        $search_vinyl->closeCursor();
        if (!$valid_vinyl)
            echo '<script type="text/javascript">alert("Ce vinyle existe déjà.")</script>';
        else {
            $add_vinyl = $bdd->prepare('INSERT INTO vinyl(vinyl_name, artist_name, country, price, status, specificity) VALUES(:vinyl_name, :artist_name, :country, :price, :status, :specificity)');
            $add_vinyl->execute(array(
                'vinyl_name' => $vinyl_name,
                'artist_name' => $artist_name,
                'country' => $country,
                'price' => $price,
                'status' => $status,
                'specificity' => $specificity,
            ));
            $add_vinyl->closeCursor();
            echo '<script type="text/javascript">alert("Vous avez bien ajouter un nouveau vinyle.")</script>';
        }
    }
}