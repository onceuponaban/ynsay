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
        <script type="text/javascript" src="oXHR.js"></script>
        <script type="text/javascript">
            function changeform(nombre) {
                if(nombre === 1)
                {
                    document.getElementById("formI").style.display="inherit";
                    document.getElementById("formC").style.display="none";
                }
                if(nombre === 2)
                {
                   document.getElementById("formC").style.display="inherit";
                   document.getElementById("formI").style.display="none";
                }
            }
        </script>
    </head>
    
    <body>
        <img class="logo" src="../images/Logo.png" alt="Logo du site"/>
        

        <fieldset id="formC" style="display: inherit;">

        <fieldset>
            <legend>Connexion</legend>
                <form method="post" action="verifConnexion.php">
                    <p>Pseudonyme : <input type="text" name="pseudo"></p>
                    <p>Mot de passe : <input type="password" name="mdp"></p>
                    <input type="submit" value="Valider">
                </form>
                <button onclick="changeform(1)">Pas encore inscrit ?</button>
        </fieldset>
        
        <fieldset id="formI" style="display: none;">
            <legend>Inscription</legend>
                <form method="post" action="verifInscription.php">
                    <p>Votre pseudo utilisateur : <input type="text" name="pseudo"></p>
                    <p>E-mail : <input type="text" name="email"></p>
                    <p>Votre mot de passe : <input type="password" name="mdp"></p>
                    <p>Confirmation de votre mot de passe : <input type="password" name="cmdp"></p>
                    <input type="submit" value="Valider">
                </form>
                <button onclick="changeform(2)">Me connecter</button>
        </fieldset>
    </body>
</html>

