<!--
Code de la page crée le 19/12/2016 par Romain Jacquiez
Nom de la page : accueil
But de la page : page d'accueil, connexion / inscription
-->

<?php
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
        <title>Ynsay</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Présentation de Ynsay,
        formulaire de connexion/inscription" />
        <link href="../css/accueil.css" rel="stylesheet" type="text/css"/>
    </head>
    
    <body>
        <img class="logo" src="../images/Logo.png" alt="Logo du site"/>
        
        <fieldset>
            <legend>Connexion</legend>
                <form method="post" action="verifConnexion.php">
                    <p>Pseudonyme : <input type="text" name="pseudo"></p>
                    <p>Mot de passe : <input type="password" name="mdp"></p>
                    <input type="submit" value="Valider">
                </form>
        </fieldset>
    </body>
</html>

