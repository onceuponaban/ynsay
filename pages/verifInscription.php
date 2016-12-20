<?php

/*
  Crée le 19 déc. 2016, 14:46
  Auteur : Romain Jacquiez
  Nom du php : verifConnexion
  But : Vérifier si les informations envoyées sont présentes dans la base de données
 */


if (( isset($_POST['pseudo']) AND empty($_POST['pseudo']) ) || ((strlen($_POST['pseudo'])) > 20)) {
    echo "Veuillez saisir un pseudo";
} else if (( isset($_POST['email']) AND empty($_POST['email']) ) || ((strlen($_POST['email'])) > 100)) {
    echo "Veuillez spécifier une adresse mail";
} else if (( isset($_POST['mdp']) AND empty($_POST['mdp']) ) || ((strlen($_POST['mdp'])) > 50)) {
    echo "Veuillez spécifier un mot de passe";
} else if (( isset($_POST['cmdp']) AND empty($_POST['cmdp']) ) || ((strlen($_POST['cmdp'])) > 50)) {
    echo "Veuillez spécifier une confirmaion de mot de passe";
} else if ((isset($_POST['mdp'])) AND isset($_POST['cmdp']) AND $_POST['mdp'] != $_POST['cmdp']) {
    echo "Votre mot de passe et sa confirmation sont différentes";
}

if (isset($_POST['pseudo']) AND !empty($_POST['pseudo'])AND
        isset($_POST['mdp']) AND !empty($_POST['mdp']) AND
        isset($_POST['cmdp']) AND !empty($_POST['cmdp']) AND
        isset($_POST['email']) AND !empty($_POST['email']) AND ( strlen($_POST['pseudo']) <= 20) AND ( strlen($_POST['mdp']) <= 50)
        AND ( strlen($_POST['cmdp']) <= 50) AND ( strlen($_POST['email']) <= 100)) {
    try {
        $pseudo = $_POST['pseudo'];
        $email = $_POST['email'];
        $mdp = md5($_POST['mdp']);
        $erreur = false;

        $dbh = new PDO('mysql:host=localhost;dbname=ynsay', 'root', '');
        $resultat = $dbh->query("SELECT id_utilisateur, pseudo, email FROM utilisateur ORDER BY id_utilisateur");
        $check = $resultat->fetch(PDO::FETCH_NUM);
        if ($check == true) {
            foreach ($resultat as $ligne) {
                if ($pseudo === $ligne['pseudo']) {
                    $erreur = true;
                    break;
                } else if ($email === $ligne['email']) {
                    $erreur = true;
                    break;
                }
            }

            if ($erreur != true) {
                //On remplit une ligne dans la table utilisateur
                $stmt = $dbh->prepare("INSERT INTO utilisateur (pseudo,email,password) VALUES (?,?,?)");
                $stmt->bindParam(1, $pseudo);
                $stmt->bindParam(2, $email);
                $stmt->bindParam(3, $mdp);
                $stmt->execute();
                
            } else {
                echo "Pseudo ou e-mail déjà utilisés";
            }
        }
    } catch (PDOExeption $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
    if ($erreur != true) {
        header('location: accueil.php');
    }
}
?>