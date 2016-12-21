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

   

    <body class="#212121 grey darken-4" >
         <header>
        <!-- metre en place le logo a droite puis metre en place le nuage de tag et bouton envoyer dans le header  -->
        <img class="logo" src="../images/Logo.png" alt="Logo du site"/>
        <fieldset>
            <legend>liste des tags </legend>
            <table>
                <tr>
                    <td>promo :</td>
                    <td>cycle :</td>
                    <td>cours :</td>
                    <td>association :</td>
                </tr>
                <tr>
                    <td> <button onclick="">N1</button></td> 
                    <td>  <button onclick="">CIR</button></td>
                </tr>
                <tr>
                    <td> <button onclick="">N2</button></td> 
                    <td>  <button onclick="">CSI</button></td>
                </tr>
                <tr>
                    <td> <button onclick="">N3</button></td> 
                    <td>  <button onclick="">CNB</button></td>
                </tr>
                <tr>
                    <td> <button onclick="">M1</button></td> 
                    <td>  <button onclick="">IT2I</button></td>
                </tr>
                <tr>
                    <td> <button onclick="">M2</button></td> 
                    <td>  <button onclick=""></button></td>
                </tr>
                
            </table>

                

        </fieldset>

    </header>

    </body>
</html>