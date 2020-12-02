<?php
function start_bdd() {
    try
    {
	    $bdd = new PDO('mysql:host=localhost;dbname=site_vinyle;charset=utf8', 'root', 'root');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    return $bdd;
}