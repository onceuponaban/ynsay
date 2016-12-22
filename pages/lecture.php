<?php
/**
  la page crée le 19/12/2016 par pierre parrat
  Nom de la page : accueil
  But de la page : ecriture des articles
 */

include 'extention_de_code/verifSession.php';

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
</header>
<?php
    include 'profilUtilisateur.php'; // appel  du profil utilisateur
    include 'selectionTag.php'; // appel de la fonction de selection des tag
    include 'footer.php'; // appel du footer
?>
</body>
<script src="../js/materialize.js" type="text/javascript"></script>
</html>