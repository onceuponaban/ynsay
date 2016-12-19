<?php
/*
  ode de la page crée le 19/12/2016 par pierre parrat
  Nom de la page : accueil
  But de la page : ecriture des articles
 */
session_start();
if ((!isset($_SESSION['connecte'])) || (isset($_POST['deconnecte']))) {
    $_SESSION ['connecte'] = false;
    $_SESSION['pseudo'] = "";
}
if (!isset($_SESSION['pseudo'])) {
    $_SESSION['pseudo'] = "";
}
?>

<html>
    <head>
        <title>Ecrire un article</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Page d'écriture des articles" />
        <link href="../css/accueil.css" rel="stylesheet" type="text/css"/>
        <link href="../css/materialize.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>
        <header>
            <img class="logoEcriture" src="../images/Logo.png" alt="Logo du site"/> 
            
        </header>


        <fieldset>
            <legend>Ecrire un article</legend>
            <form method="post" action="verifArticle.php">
                <p>Titre : <input type="text" name="titre"></p>
                <p>Corps de l'article : <textarea name="corps">Votre article...</textarea></p>
                <p>Tags :</p>
                <p>CIR <input type="checkbox" name="tag" value="cir"></p>
                <p>CSI <input type="checkbox" name="tag" value="csi"></p>
                <input type="submit" value="Valider">
            </form>
        </fieldset>
    </body>
    <script src="../js/materialize.js" type="text/javascript"></script>
</html>

