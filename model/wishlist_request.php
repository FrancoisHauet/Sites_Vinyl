<?php
include_once("./class/class_vinyl.php");
include_once("class/class_login.php");
include_once("start_bdd.php");

$bdd = start_bdd();
$search_vinyl = $bdd->prepare('SELECT vinyl_name, artist_name, specificity FROM wishlist') or die(print_r($bdd->errorInfo()));
$search_vinyl->execute();
$user = $_SESSION['user'];
if ($user->permission == "Admin") {
?>
    <div class="buttons-container">
        <div class="container">
            <a href="add_wishlist.php" class="button">Ajouter un vinyle</a>
        </div>
        <div class="container">
            <a href="delete_wishlist.php" class="button">Supprimer un vinyle</a>
        </div>
    </div>
<?php } ?>
    <table class="rwd-table">
        <tr>
            <th>Nom du vinyle</th>
            <th>Ariste</th>
            <th>Spécificité</th>
        </tr>
    <?php
    while ($data = $search_vinyl->fetch()) {
    ?>
        <tr>
            <td data-th="Nom du vinyle"><?php echo $data['vinyl_name'];?></td>
            <td data-th="Ariste"><?php echo $data['artist_name'];?></td>
            <td data-th="Spécificité"><?php echo $data['specificity'];?></td>
        </tr>
    <?php
} ?>
</table>