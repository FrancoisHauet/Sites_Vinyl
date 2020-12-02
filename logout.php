<?php
    include_once("class/class_login.php");
?>
<!DOCTYPE html>
<html lang="fr" >
<head>
    <meta charset="UTF-8">
    <title>Site Vinyle</title>
    <link rel="icon" href="asset/vinyl.ico">
    <link rel="stylesheet" href="asset/CSS/style.css">
    <?php include_once("model/login.php") ?>
</head>
<body>
<?php
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        if ($user->permission == "User" OR $user->permission == "Admin") {
            echo '<script type="text/javascript">alert("Vous vous êtes déconnecté.")</script>';
            $_SESSION['user'] = NULL;
            session_destroy();
            include_once("index.php");
        }
    }
?>
</body>
</html>