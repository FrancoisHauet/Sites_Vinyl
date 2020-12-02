<?php
include_once("./class/class_vinyl.php");
include_once("start_bdd.php");

$bdd = start_bdd();
if (isset($_POST['submit'])) {
    $check_vinyl_name = vinyl::check_string($vinyl_name = htmlspecialchars($_POST["vinyl_name"]));
    $check_artist_name = vinyl::check_string($artist_name = htmlspecialchars($_POST["artist_name"]));
    $check_country = vinyl::check_string($country = htmlspecialchars($_POST["country"]));
    if (!$check_vinyl_name)
        echo '<script type="text/javascript">alert("Le nom du vinyle ne peut être ajouté car vous utilisez un caractère spéciale.")</script>';
    else if (!$check_artist_name)
        echo '<script type="text/javascript">alert("Cet artiste/Groupe ne peut être ajouté car vous utilisez un caractère spéciale.")</script>';
    else if (!$check_country)
        echo '<script type="text/javascript">alert("Ce pays ne peut être ajouté car vous utilisez un caractère spéciale.")</script>';
    else {
        $i = 0;
        $valid_vinyl = false;
        if ($country != NULL) {
            $search_vinyl = $bdd->prepare('SELECT vinyl_name, artist_name, country FROM vinyl WHERE vinyl_name = :vinyl_name AND artist_name = :artist_name AND country = :country') or die(print_r($bdd->errorInfo()));
            $search_vinyl->bindValue(":vinyl_name", $vinyl_name);
            $search_vinyl->bindValue(":artist_name", $artist_name);
            $search_vinyl->bindValue(":country", $country);
            $search_vinyl->execute();
            while ($data = $search_vinyl->fetch()) {
                if ($data["vinyl_name"] == $vinyl_name AND $data["artist_name"] == $artist_name AND $data["country"] == $country)
                    $valid_vinyl = true;
                    $i++;
            }
            $search_vinyl->closeCursor();
        }
        else {
            $search_vinyl = $bdd->prepare('SELECT vinyl_name, artist_name, country FROM vinyl WHERE vinyl_name = :vinyl_name AND artist_name = :artist_name') or die(print_r($bdd->errorInfo()));
            $search_vinyl->bindValue(":vinyl_name", $vinyl_name);
            $search_vinyl->bindValue(":artist_name", $artist_name);
            $search_vinyl->execute();
            while ($data = $search_vinyl->fetch()) {
                if ($data["vinyl_name"] == $vinyl_name AND $data["artist_name"] == $artist_name)
                    $valid_vinyl = true;
                    $i++;
            }
            $search_vinyl->closeCursor();
        }
        if (!$valid_vinyl)
            echo '<script type="text/javascript">alert("Ce vinyle n\'existe pas dans la collection de François.")</script>';
        elseif ($i > 1)
            echo '<script type="text/javascript">alert("Il y a plusieurs versions du vinyle qui existe. Veuillez préciser le lieu de pressage du vinyle pour déterminer lequel voulez-vous supprimer.")</script>';
        else {
            if ($country != NULL) {
                $delete_vinyl = $bdd->prepare('DELETE FROM vinyl WHERE vinyl_name = :vinyl_name AND artist_name = :artist_name AND country = :country') or die(print_r($bdd->errorInfo()));
                $delete_vinyl->bindValue(":vinyl_name", $vinyl_name);
                $delete_vinyl->bindValue(":artist_name", $artist_name);
                $delete_vinyl->bindValue(":country", $country);
                $delete_vinyl->execute();
                echo '<script type="text/javascript">alert("Le vinyle à été supprimé.")</script>';
            } else {
                $delete_vinyl = $bdd->prepare('DELETE FROM vinyl WHERE vinyl_name = :vinyl_name AND artist_name = :artist_name') or die(print_r($bdd->errorInfo()));
                $delete_vinyl->bindValue(":vinyl_name", $vinyl_name);
                $delete_vinyl->bindValue(":artist_name", $artist_name);
                $delete_vinyl->execute();
                echo '<script type="text/javascript">alert("Le vinyle à été supprimé.")</script>';
            }
        }
    }
}