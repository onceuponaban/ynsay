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
    <!-- metre en place le logo a droite puis metre en place le nuage de tag  -->
    <img class="logo" src="../images/Logo.png" alt="Logo du site"/>


    <table>
        <tr>
            <td><button id="N1" onclick="">N1</button></td>
            <td><button id="N2" onclick="">N2</button></td>
            <td><button id="N3" onclick="">N3</button></td>
            <td><button id="M1" onclick="">M1</button></td>
            <td><button id="M2" onclick="">M2</button></td>
        </tr>
        <tr>
            <td><button id="CIR" onclick="">CIR</button></td>
            <td><button id="CSI" onclick="">CSI</button></td>
            <td><button id="CNB" onclick="">CNB</button></td>
            <td><button id="IT2I" onclick="">IT2I</button></td>

        </tr>
        <tr>
            <td><button id="General" onclick="">General</button></td>
            <td><button id="cours" onclick="">cours</button></td>
            <td><button id="humour" onclick="">humour</button></td>
        </tr>
        <tr>
            <td><button id="BDE" onclick="">BDE</button></td>
            <td><button id="BC2I" onclick="">BC2I</button></td>
            <td><button id="Partage" onclick="">Partage</button></td>
            <td><button id="BDS" onclick="">BDS</button></td>
            <td><button id="Pict'isen" onclick="">Pict'isen</button></td>
            <td><button id="Studios" onclick="">Studios</button></td>
            <td><button id="Repair" onclick="">Repair</button></td>
        </tr>

    </table>
    <!--  bouton  pour ecrire un article  -->
    <button onclick="" >Ecrire un article </button>
</header>


<?php include 'profilUtilisateur.php';?>



<?php include 'footer.php';?>
</body>
<script src="../js/materialize.js" type="text/javascript"></script>
</html>