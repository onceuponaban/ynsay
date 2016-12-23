<?php

session_start();

/*
  Crée le 19 déc. 2016, 14:46
  Auteur : Romain Jacquiez
  Nom du php : verifInscription
  But : Vérifier si les informations envoyées sont présentes sont correctes
 */


if (( isset($_GET['pseudo']) AND empty($_GET['pseudo']) ) || ((strlen($_GET['pseudo'])) > 20)) {
    echo "Veuillez saisir un pseudo";
} else if (( isset($_GET['email']) AND empty($_GET['email']) ) || ((strlen($_GET['email'])) > 100)) {
    echo "Veuillez spécifier une adresse mail";
}else if ((preg_match("/^[-+.\w]{1,64}@[-.\w]{1,64}\.[-.\w]{2,6}$/i", $_GET['email'])) == 0) {
    echo "L'adresse ".$_GET['email']." n'est pas valide";
} else if (( isset($_GET['mdp']) AND empty($_GET['mdp']) ) || ((strlen($_GET['mdp'])) > 50)) {
    echo "Veuillez spécifier un mot de passe";
} else if (( isset($_GET['cmdp']) AND empty($_GET['cmdp']) ) || ((strlen($_GET['cmdp'])) > 50)) {
    echo "Veuillez spécifier une confirmaion de mot de passe";
} else if ($_GET['mdp'] != $_GET['cmdp']) {
    echo "Votre mot de passe et sa confirmation sont différents";
}

if (isset($_GET['pseudo']) AND !empty($_GET['pseudo'])AND
        isset($_GET['mdp']) AND !empty($_GET['mdp']) AND
        isset($_GET['cmdp']) AND !empty($_GET['cmdp']) AND
        isset($_GET['email']) AND !empty($_GET['email']) AND ( strlen($_GET['pseudo']) <= 20) AND ( strlen($_GET['mdp']) <= 50)
        AND ( strlen($_GET['cmdp']) <= 50) AND ( strlen($_GET['email']) <= 100) AND ($_GET['mdp'] == $_GET['cmdp'])) {
    try {
        $pseudo = $_GET['pseudo'];
        $email = $_GET['email'];
        $mdp = md5($_GET['mdp']);
        $erreur = false;

        $dbh = new PDO('mysql:host=localhost;dbname=ynsay', 'root', 'LRRH4H');
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
                $_SESSION['inscrit']='true';
                
            } else {
                echo "Pseudo ou e-mail déjà utilisés";
            }
        }
    } catch (PDOExeption $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
}
?>