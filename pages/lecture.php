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
    <title>Ynsay</title>
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


        <table>
            <tr>
                <td><button class="espacement-label" onclick="">N1</button></td>
                <td><button class="espacement-label" onclick="">N2</button></td>
                <td><button class="espacement-label" onclick="">N3</button></td>
                <td><button class="espacement-label" onclick="">M1</button></td>
                <td><button class="espacement-label" onclick="">M2</button></td>

            </tr>
            <tr>
                <td><button onclick="">CIR</button></td>
                <td><button onclick="">CSI</button></td>
                <td><button onclick="">CNB</button></td>
                <td><button onclick="">IT2I</button></td>
            </tr>
            <tr>
                <td><button onclick="">General</button></td>
                <td><button onclick="">cours</button></td>
                <td><button onclick="">humour</button></td>
            </tr>
            <tr>
                <td><button onclick="">BDS</button></td>
                <td><button onclick="">BC2I</button></td>
                <td><button onclick="">Partage</button></td>
                <td><button onclick="">BDS</button></td>
                <td><button onclick="">Pict'isen</button></td>
                <td><button onclick="">Studios</button></td>
                <td><button onclick="">Repair</button></td>
            </tr>

        </table>


             <button onclick="" >Ecrire un article </button>

    </header>

    </body>
</html>