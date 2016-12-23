<fieldset>
    <?php
    if ($_SESSION['connecte'] === true) 
    {
        try 
        {
            $pseudo = $_SESSION['pseudo'];

            $dbh = new PDO('mysql:host=localhost;dbname=ynsay', 'root', 'LRRH4H');
            $resultat = $dbh->query("SELECT photo_profil FROM utilisateur WHERE pseudo = 'theo'");
            $check = $resultat->fetch(PDO::FETCH_NUM);
            if ($check == true) 
            {
                $urlPhoto = "../images/photo_profil.png"; //icône par défaut
                foreach ($resultat as $ligne) 
                {
                    $urlPhoto = $ligne['photo_profil'];
                    if(!file_exists($urlPhoto))
                    {
                        //Si le chemin d'accès est faux ou inexistant, renvoie à l'image par défaut
                        $urlPhoto = "../images/photo_profil.png";
                    }
                }
                //Affiche la photo de profil
                echo "<img class=\"avatar\" src=$urlPhoto alt=\"Avatar\"/>"; 
            }
        } catch (PDOExeption $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
        //Affiche un phrase de bienvenue
        echo '<p>Bienvenue '.$_SESSION['pseudo'].'</p>';
        //Affiche le bouton déconnexion, renvoie à la page deconnexion.php
        echo "<button class=\"btn waves-effect waves-light orange accent-4\" onclick=\"self.location.href='deconnexion.php'\">Déconnexion</button>";
    }   
    else //Si l'utilisateur n'est pas connecté
    {
        echo '<p>Vous n\'êtes pas connecté</p>';
        echo "<button class=\"btn waves-effect waves-light orange accent-4\" onclick=\"self.location.href='deconnexion.php'\">Revenir à l'accueil</button>";

    }
    ?>
</fieldset>



