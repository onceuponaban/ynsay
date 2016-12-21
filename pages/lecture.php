<?php
/*
  la page crée le 19/12/2016 par pierre parrat
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
        <meta name="description" content="Page de lecture  des articles" />
        <link href="../css/lecture.css" rel="stylesheet" type="text/css"/>
        <link href="../css/materialize.css" rel="stylesheet" type="text/css"/>
    </head>

   

    <body class="#212121 grey darken-4" >
         <header>
        <!-- metre en place le logo a droite puis metre en place le nuage de tag et bouton envoyer dans le header  -->
        <img class="logo" src="../images/Logo.png" alt="Logo du site"/>

            <table class="tag">

                <tr>
                    <td><button onclick="">N1</button></td>
                    <td><button onclick="">N2</button></td>
                    <td><button onclick="">N3</button></td>
                    <td><button onclick="">M1</button></td>
                    <td><button onclick="">M2</button></td>
                    <td><button onclick="">BDE</button></td>
                </tr>
                <tr>
                    <td><button onclick="">CIR</button></td>
                    <td><button onclick="">CSI</button></td>
                    <td><button onclick="">CNB</button></td>
                    <td><button onclick="">IT2I</button></td>
                    <td><button onclick="">BDS</button></td>
                </tr>
                <tr>
                    <td><button onclick="">General</button></td>
                    <td><button onclick="">cours</button></td>
                    <td><button onclick="">humour</button></td>
                    <td><button onclick="">Pict'isen</button></td>
                </tr>
                <tr>
                    <td><button onclick="">BDS</button></td>
                    <td><button onclick="">BC2I</button></td>
                    <td><button onclick="">Partage</button></td>
                </tr>
                <tr>


                </tr>

                

            </table>

    </header>

    </body>
</html>