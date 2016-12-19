<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    session_start();
    if ( (!isset($_SESSION['connecte'])) || (isset($_POST['deconnecte'])))
    {
        $_SESSION ['connecte'] = false; 
        $_SESSION['pseudo'] = "";
    }
    if (!isset($_SESSION['pseudo']))
    {
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
    </head>
    
    <body>
        <img class="logo" src="../images/Logo.png" alt="Logo du site"/>
        
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
</html>

