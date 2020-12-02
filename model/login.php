<?php
include_once("./class/class_login.php");
include_once("start_bdd.php");

$bdd = start_bdd();
session_start();
if (isset($_POST['sign_in'])) { //If I press the sign up button
    $check_first_name = user::check_string($first_name = htmlspecialchars($_POST["first_name"]));
    $check_last_name = user::check_string($last_name = htmlspecialchars($_POST["last_name"]));
    $check_username = user::check_string($username = htmlspecialchars($_POST["username_s"]));
    $check_password = user::check_string($password = htmlspecialchars($_POST["password_s"]));
    if (!$check_first_name)
        echo '<script type="text/javascript">alert("Le prénom ne peux être ajouter car vous utilisez un caractère spéciale.")</script>';
    else if (!$check_last_name)
        echo '<script type="text/javascript">alert("Le nom ne peux être ajouter car vous utilisez un caractère spéciale.")</script>';
    else if (!$check_username)
        echo '<script type="text/javascript">alert("Le pseudo ne peux être ajouter car vous utilisez un caractère spéciale.")</script>';
    else if (!$check_password)
        echo '<script type="text/javascript">alert("Le mot de passe ne peux être ajouter car vous utilisez un caractère spéciale.")</script>';
    else {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $user_exist = $bdd->prepare('SELECT username FROM account WHERE username = :username') or die(print_r($bdd->errorInfo()));
        $user_exist->BindValue(':username', $username);
        $user_exist->execute();
        $valid_user = true;

        while ($data = $user_exist->fetch()) {
            if ($data["username"] == $username)
                $valid_user = false;
        }
        $user_exist->closeCursor();
        if (!$valid_user) {
            echo '<script type="text/javascript">alert("Utilisateur existe déjà, connecter vous avec ce pseudo ou inscivez-vous avec un autre pseudo.")</script>';
        } else {
            $req = $bdd->prepare('INSERT INTO account (first_name, last_name, username, password) VALUES(?, ?, ?, ?)') or die(print_r($bdd->errorInfo()));
            $req->execute(array($first_name, $last_name, $username, $password));
            $req->closeCursor();
            echo '<script type="text/javascript">alert("Votre inscription à été accepté. Vous pouvez vous connecter !")</script>';
        }
    }
    
    
} else if (isset($_POST['login'])) { //If I press the log button
    $username = htmlspecialchars($_POST["username_l"]);
    $password = htmlspecialchars($_POST["password_l"]);
    $connection = $bdd->prepare('SELECT password FROM account WHERE username = :username') or die(print_r($bdd->errorInfo()));
    $connection->BindValue(':username', $username);
    $connection->execute();
    $valid_connection = false;
    while ($data_connection = $connection->fetch()) {
        if (password_verify($password, $data_connection['password'])) {
            $valid_connection = true;
        }
    }
    $connection->closeCursor();
    if (!$valid_connection)
        echo '<script type="text/javascript">alert("Mot de passe ou identifiant incorrect. Veuillez recommencez")</script>';
    else {
        $check_log = $bdd->prepare('SELECT permission, first_name, last_name FROM account WHERE username = :username') or die(print_r($bdd->errorInfo()));
        $check_log->BindValue(':username', $username);
        $check_log->execute();
        while ($data_permission = $check_log->fetch()) {
            $permission = $data_permission['permission'];
            $first_name = $data_permission['first_name'];
            $last_name = $data_permission['last_name'];
        }
        $user = new user($first_name, $last_name, $username, $permission);
        $_SESSION['user'] = $user;
        header('Location:./Home_page.php');
    }
}