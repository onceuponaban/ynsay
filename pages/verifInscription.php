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
} else if (( isset($_POST['cmdp']) AND empty($_POST['cmdp']) ) || ((strlen($_POST['cmdp'])) > 50)) {
    echo "Veuillez spécifier une confirmaion de mot de passe";
} else if (( isset($_POST['email']) AND empty($_POST['email']) ) || ((strlen($_POST['email'])) > 100)) {
    echo "Veuillez spécifier une adresse mail";
}

if (isset($_POST['pseudo']) AND !empty($_POST['pseudo'])AND
        isset($_POST['mdp']) AND !empty($_POST['mdp']) AND
        isset($_POST['cmdp']) AND !empty($_POST['cmdp']) AND
        isset($_POST['email']) AND !empty($_POST['email']) AND
        ( strlen($_POST['pseudo']) <= 20) AND ( strlen($_POST['mdp']) <= 50) 
        AND ( strlen($_POST['cmdp']) <= 50) AND ( strlen($_POST['email']) <= 100)) {
    try {
        $pseudo = $_POST['pseudo'];
        $mdp = md5($_POST['mdp']);
        $cmdp = md5($_POST['cmdp']);
        $email = $_POST['email'];
        
        $dbh = new PDO('mysql:host=localhost;dbname=ynsay', 'root', '');
        $resultat = $dbh->query("INSERT id_utilisateur, pseudo, password, email INTO utilisateur");
        $check = $resultat->fetch(PDO::FETCH_NUM);
        if ($check == true) {
            foreach ($resultat as $ligne) {
                if (($pseudo === $ligne['pseudo']) 
                        AND ( $mdp === $ligne['password'])
                        AND ($email === $ligne['email'])) {
                    $_SESSION['connecte'] = true;
                    $_SESSION['pseudo'] = $ligne['pseudo'];
                    header('location: ../accueil.php');
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

