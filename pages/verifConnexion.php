<?php

session_start();

/*
  Crée le 19 déc. 2016, 14:46
  Auteur : Romain Jacquiez
  Nom du php : verifConnexion
  But : Vérifier si les informations envoyées sont présentes dans la base de données
 */

if (( isset($_GET['pseudo']) AND empty($_GET['pseudo']) ) || ((strlen($_GET['pseudo'])) > 20)) {
    echo "Veuillez saisir un pseudo";
} else if (( isset($_GET['mdp']) AND empty($_GET['mdp']) ) || ((strlen($_GET['mdp'])) > 50)) {
    echo "Veuillez spécifier un mot de passe";
}


if (isset($_GET['pseudo']) AND !empty($_GET['pseudo'])AND
        isset($_GET['mdp']) AND !empty($_GET['mdp']) AND ( strlen($_GET['pseudo']) <= 20) AND ( strlen($_GET['mdp']) <= 50)) {

    try {
        $pseudo = $_GET['pseudo'];
        $mdp = md5($_GET['mdp']);

        $dbh = new PDO('mysql:host=localhost;dbname=ynsay', 'root', 'LRRH4H');
        $resultat = $dbh->query("SELECT id_utilisateur, pseudo, password FROM utilisateur ORDER BY id_utilisateur");
        $check = $resultat->fetch(PDO::FETCH_NUM);
        if ($check == true) {
            foreach ($resultat as $ligne) {
                if (($pseudo === $ligne['pseudo']) AND ( $mdp === $ligne['password'])) {
                    $_SESSION['connecte'] = true;
                    $_SESSION['pseudo'] = $ligne['pseudo'];
					$_SESSION['id'] = $ligne['id_utilisateur'];
                }
            }
            if(!$_SESSION['connecte'])
            {
                echo 'Aucun compte ne correspond à ces données';
            }
        }
    } catch (PDOExeption $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
}
?>
