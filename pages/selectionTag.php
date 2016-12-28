<form action="./lecture.php"  method="get" name="verificationTag" >
<fieldset>
    <?php

    /**
     * ON peut recuperer la valeur des checkbox par des get et non par du post , c 'est enervant
     */

    try
    {
        $dbh = new PDO('mysql:host=localhost;dbname=ynsay', 'root', ''); // connection a la bdd
        $resultat = $dbh->query("SELECT id_tag, nom_tag, description_tag FROM tag"); // requete sql sur la bdd
        $check = $resultat->fetch(PDO::FETCH_NUM);
        if ($check == true)
        {
            echo '<table>';  //mise en place d'un tableau en html
            $descriptionAv = "";
            foreach ($resultat as $ligne)
            {
                $nom = $ligne['nom_tag']; //
                $id = $ligne['id_tag'];
                $description = $ligne['description_tag'];

                if($description !== $descriptionAv) // si on ateint le bout de la ligne on change de ligne
                {
                    if($descriptionAv !== "")
                    {
                        echo"</tr>"; // fin de la ligne
                    }
                    echo "<tr>";     // debut de la nouvelle ligne
                }
                // dans les checkbox on a un tableau qui se nomme nomTag[] qui va stocker les value des checkbox qui seront cochées ,
                echo"<td><input type=\"checkbox\" id=$id name='nomTag[]' value=$id><label for=$id>$nom</label></td>"; // insertion des valeurs dans des bouttons de type checkbox

                $descriptionAv = $description;
            }
            echo '</table>';  // fin du tableau

            echo '<input type ="submit" value="envoyer" >' ;
        }
    } catch (PDOExeption $e) { // recuperation des erreurs
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
    ?>
</fieldset>
  </form>

<?php
/*
// affiche si l'on a bien la recupération des id des tags
if(isset($_GET["nomTag"]))
{
    foreach ($_GET['nomTag'] as $valeur)
    {
        echo "La checkbox $valeur a été cochée<br>";
    }

}
*/



