<!--
Page crée le 19/12/2016 par Antoine Berenguer
Nom de la page : Ecriture
But de la page : Ecriture d'un article sur le site
-->

<?php
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
        <title>ecrire votre article </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Page d'écriture des articles" />
        <link href="../css/ecriture.css" rel="stylesheet" type="text/css"/>
        <link href="../css/materialize.css" rel="stylesheet" type="text/css"/>
    </head>
    <header>
        <!-- metre en place le logo a droite puis metre en place le nuage de tag dans le header  -->
        <img class="logo" src="../images/Logo.png" alt="Logo du site"/>

    </header>

    <body class="#212121 grey darken-4">

        <fieldset>
            <legend>Ecrivez votre article</legend>
            <form method="post" action="verifArticle.php">
                <p>titre de votre article  <input type="text" name="titre"></p>
                <p>Corps de votre article : <textarea name="corps">Votre article...</textarea></p>
                <input class="btn waves-effect waves-light orange accent-4" type="submit" value="Valider">
            </form>
        </fieldset>
    </body>
</html>