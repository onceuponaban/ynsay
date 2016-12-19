<?php

try {
    $bdd = new PDO('mysql:host=localhost;dbname=user', 'root', ''); //Connexion BDD
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    die();
}
?>