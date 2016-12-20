<?php
/* la page crée le 19/12/2016 par pierre parrat
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
        <title>ecrire votre article </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Page d'écriture des articles" />
        <link href="../css/ecriture.css" rel="stylesheet" type="text/css"/>
        <link href="../css/materialize.css" rel="stylesheet" type="text/css"/>
    </head>

    <header>
        <!-- metre en place le logo a droite puis metre en place le nuage de tag et bouton envoyer dans le header  -->
        <img class="logo" src="../images/Logo.png" alt="Logo du site"/>
        <fieldset>
            <legend>liste des tags </legend>
            <fieldset>
                <legend>tag promo:</legend>
                <p> cir1 </p>
                <p> cir2 </p>

            </fieldset>



        </fieldset>

    </header>

    <body class="#212121 grey darken-4" >

    </body>
</html>