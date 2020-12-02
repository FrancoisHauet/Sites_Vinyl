<?php
include_once("./class/class_vinyl.php");
include_once("start_bdd.php");

$bdd = start_bdd();
if (isset($_POST['submit'])) {
    $check_vinyl_name = vinyl::check_string($vinyl_name = htmlspecialchars($_POST["vinyl_name"]));
    $check_artist_name = vinyl::check_string($artist_name = htmlspecialchars($_POST["artist_name"]));
    if ($vinyl_name == NULL AND $artist_name == NULL)
        echo '<script type="text/javascript">alert("Vous devez remplir au moins une des catégories pour rechercher un vinyle.")</script>';
    else if (!$check_vinyl_name)
        echo '<script type="text/javascript">alert("Le nom du vinyle ne peut être ajouté car vous utilisez un caractère spéciale.")</script>';
    else if (!$check_artist_name)
        echo '<script type="text/javascript">alert("Cet artiste/Groupe ne peut être ajouté car vous utilisez un caractère spéciale.")</script>';
    else {
        if($vinyl_name == NULL) {
            $search_vinyl = $bdd->prepare('SELECT vinyl_name, artist_name, country, price, status, specificity FROM vinyl WHERE artist_name = :artist_name') or die(print_r($bdd->errorInfo()));
            $search_vinyl->bindValue(":artist_name", $artist_name);
            $search_vinyl->execute();
        } else if ($artist_name == NULL) {
            $search_vinyl = $bdd->prepare('SELECT vinyl_name, artist_name, country, price, status, specificity FROM vinyl WHERE vinyl_name = :vinyl_name') or die(print_r($bdd->errorInfo()));
            $search_vinyl->bindValue(":vinyl_name", $vinyl_name);
            $search_vinyl->execute();
        } else {
            $search_vinyl = $bdd->prepare('SELECT vinyl_name, artist_name, country, price, status, specificity FROM vinyl WHERE vinyl_name = :vinyl_name') or die(print_r($bdd->errorInfo()));
            $search_vinyl->bindValue(":vinyl_name", $vinyl_name);
            $search_vinyl->execute();
        } ?>
            <table class="rwd-table">
                <tr>
                    <th>Nom du vinyle</th>
                    <th>Ariste</th>
                    <th>Pays de pressage</th>
                    <th>Prix</th>
                    <th>Etat</th>
                    <th>Spécificité</th>
                </tr>
            <?php
        while ($data = $search_vinyl->fetch()) {
            ?>
                <tr>
                    <td data-th="Nom du vinyle"><?php echo $data['vinyl_name'];?></td>
                    <td data-th="Ariste"><?php echo $data['artist_name'];?></td>
                    <td data-th="Pays de pressage"><?php echo $data['country'];?></td>
                    <td data-th=Prix"><?php echo $data['price'];?></td>
                    <td data-th="Etat"><?php echo $data['status'];?></td>
                    <td data-th="Spécificité"><?php echo $data['specificity'];?></td>
                </tr>
            <?php
        } ?>
            </table>
        <?php 
    }
}