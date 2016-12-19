<?php

/*
  Crée le 19 déc. 2016, 14:46
  Auteur : Romain Jacquiez
  Nom du php : verifConnexion
  But : Vérifier si les informations envoyées sont présentes dans la base de données
 */

if (( isset($_POST['pseudo']) AND empty($_POST['pseudo']) ) || ((strlen($_POST['pseudo'])) > 20)) {
    echo "Veuillez saisir un pseudo";
} else if (( isset($_POST['mdp']) AND empty($_POST['mdp']) ) || ((strlen($_POST['mdp'])) > 50)) {
    echo "Veuillez spécifier un mot de passe";
}

if (isset($_POST['pseudo']) AND !empty($_POST['pseudo'])AND
        isset($_POST['mdp']) AND !empty($_POST['mdp']) AND ( strlen($_POST['pseudo']) <= 20) AND ( strlen($_POST['mdp']) <= 50)) {
    try {
        $pseudo = $_POST['pseudo'];
        $mdp = md5($_POST['mdp']);

        $dbh = new PDO('mysql:host=localhost;dbname=ynsay', 'root', 'LRRH4H');
        $resultat = $dbh->query("SELECT id_utilisateur, pseudo, password FROM utilisateur ORDER BY id_utilisateur");
        $check = $resultat->fetch(PDO::FETCH_NUM);
        if ($check == true) {
            foreach ($resultat as $ligne) {
                if (($pseudo === $ligne['pseudo']) AND ( $mdp === $ligne['password'])) {
                    $_SESSION['connecte'] = true;
                    $_SESSION['pseudo'] = $ligne['pseudo'];
                    header('location: ../index.php');
                }
            }
            if ($_SESSION['connecte'] === false) {
                echo 'Aucun utilisateur trouvé';
            }
        }
    } catch (PDOExeption $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
}
?>
