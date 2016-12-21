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
        <link href="../css/materialize.css" rel="stylesheet" type="text/css"/>
        <script src="../js/oXHR.js" type="text/javascript"></script>
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
            
            function request(callback){
                    var xhr = getXMLHttpRequest();

                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === 4 && (xhr.status === 200 || xhr.status === 0)) 
                        {
                            callback(xhr.responseText,1);
                            document.getElementById("loader").style.display = "none";
                        }
                        else if (xhr.readyState < 4) 
                        {
                            document.getElementById("loader").style.display = "inherit";
                        }
                    }; 
                    
                    var pseudo = encodeURIComponent(document.getElementById("pseudo").value);
                    var mdp = encodeURIComponent(document.getElementById("mdp").value);
                    
                    xhr.open("GET","verifConnexion.php?pseudo="+pseudo+"&mdp="+mdp+"",true);
                    xhr.send(null);
            }
            
            function request2(callback){
                    var xhr = getXMLHttpRequest();

                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === 4 && (xhr.status === 200 || xhr.status === 0)) 
                        {
                            callback(xhr.responseText,2);
                            document.getElementById("loader").style.display = "none";
                        }
                        else if (xhr.readyState < 4) 
                        {
                            document.getElementById("loader").style.display = "inherit";
                        }
                    }; 
                    
                    var pseudo2 = encodeURIComponent(document.getElementById("pseudoI").value);
                    var email2 = encodeURIComponent(document.getElementById("emailI").value);
                    var mdp2 = encodeURIComponent(document.getElementById("mdpI").value);
                    var cmdp2 = encodeURIComponent(document.getElementById("cmdpI").value);
                    
                    xhr.open("GET","verifInscription.php?pseudo="+pseudo2+"&email="+email2+"&mdp="+mdp2+"&cmdp="+cmdp2+"",true);
                    xhr.send(null);
            }
                        
            function readData(data,nb)
            {
                if(nb === 1)
                {
                    document.getElementById("erreur").innerHTML = data;
                }
                if(nb === 2)
                {
                    document.getElementById("erreur2").innerHTML = data;
                }
            }
            
            function reiniterreur(code)
            {
                if(code === 1)
                {
                    document.getElementById("erreur").innerHTML = null;
                }
                if (code === 2)
                {
                    document.getElementById("erreur2").innerHTML = null;
                }
            }
        </script>
    </head>
    
    <body class="#212121 grey darken-4">
        <center><img class="logo" src="../images/Logo.png" alt="Logo du site"/></center>
        

        <fieldset id="formC" style="display: inherit;">
            <legend>Connexion</legend>
                <form>
                    <div id="erreur"></div>
                    <p>Pseudonyme : <input id="pseudo" type="text" name="pseudo"></p>
                    <p>Mot de passe : <input id="mdp" type="password" name="mdp"></p>
                    <span id="loader" style="display: none;"><img style="width: 6%;" src="../images/loader.gif" alt="Chargement" /></span></br>
                </form>
            <div id="bouton">
                <button class="btn waves-effect waves-light orange accent-4" onclick="request(readData);">Valider</button></br>
            </div>
            <div id="bouton">
                <button class="btn waves-effect waves-light orange accent-4" onclick="changeform(1);reiniterreur(1);">Pas encore inscrit ?</button>
            </div>    
        </fieldset>
        <fieldset id="formI" style="display: none;">
            <legend>Inscription</legend>
                <form>
                    <div id="erreur2"></div>
                    <p>Votre pseudo utilisateur : <input id="pseudoI" type="text" name="pseudo"></p>
                    <p>E-mail : <input id="emailI" type="text" name="email"></p>
                    <p>Votre mot de passe : <input id="mdpI" type="password" name="mdp"></p>
                    <p>Confirmation de votre mot de passe : <input id="cmdpI" type="password" name="cmdp"></p>
                    <span id="loader" style="display: none;"><img style="width: 6%;" src="../images/loader.gif" alt="Chargement" /></span></br>
                </form>
            <div id="bouton">
                <button class="btn waves-effect waves-light orange accent-4" onclick="request2(readData);">Valider</button></br>
            </div>
            <div id="bouton">
                <button class="btn waves-effect waves-light orange accent-4" onclick="changeform(2);reiniterreur(2);">Me connecter</button>
            </div>
        </fieldset>
        <script src="../js/materialize.js" type="text/javascript"></script>
    </body>
</html>
