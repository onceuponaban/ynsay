<?php
/**
 * Created by PhpStorm.
 * User: pparrat
 * Date: 28/12/2016
 * Time: 17:30
 */
?>
<form action="./selectionTagEcriture.php.php"  method="post" name="verificationTag" >
   
    <fieldset>
        <?php


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
                    echo"<td><input type=\"checkbox\" id=$id name='idTag[]' value=$id><label for=$id>$nom</label></td>"; // insertion des valeurs dans des bouttons de type checkbox

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
//filières
$cirTF = 0 ;            //*  variable qui permetrons de voir si la valeur a été selectionné ou pas pour l'inserer dans la BDD
$cnbTF = 0 ;            //*
$csiTF = 0 ;            //*
$x3TF  = 0 ;            //*
$itiiTF= 0 ;            //*

// année
$N1TF = 0 ;             //*
$N2TF = 0 ;             //*
$N3TF = 0 ;             //*
$M1TF = 0 ;             //*
$M2TF = 0 ;             //*

//assos
$bdeTF       = 0 ;      //*
$pictisenTF  = 0 ;      //*
$bdsTF       = 0 ;      //*
$bciiTF      = 0 ;      //*
$studiosTF   = 0 ;      //*
$repairTF    = 0 ;      //*


if(isset($_POST["idTag"]))
{
    foreach ($_POST['idTag'] as $valeur)
    {

        echo "La checkbox $valeur a été cochée<br>";

        //filières
        if($valeur === "Cir")       // test pour savoir si la valeur est cochée si oui alors on passe les variable précedente à 1
        {
            $cirTF = 1 ;
        }
        if($valeur === "Cnb")
        {
            $cnbTF = 1 ;
        }
        if($valeur === "Csi")
        {
            $csiTF = 1 ;
        }
        if($valeur === "X3")
        {
            $x3TF = 1 ;
        }
        if($valeur === "Itii")
        {
            $itiiTF = 1 ;
        }

        //année
        if($valeur === "N1")
        {
            $N1TF = 1 ;
        }
        if($valeur === "N2")
        {
            $N2TF = 1 ;
        }
        if($valeur === "N3")
        {
            $N3TF = 1 ;
        }
        if($valeur === "M1")
        {
            $M1TF = 1 ;
        }
        if($valeur === "M2")
        {
            $M2TF = 1 ;
        }

        //assos
        if($valeur === "Bde")
        {
            $bdeTF = 1 ;
        }
        if($valeur === "Pict'isen")
        {
            $pictisenTF = 1 ;
        }
        if($valeur === "Bds")
        {
            $bdsTF = 1 ;
        }
        if($valeur === "Bcii")
        {
            $bciiTF = 1 ;
        }
        if($valeur === "Studios")
        {
            $studiosTF = 1 ;
        }
        if($valeur === "Repair")
        {
            $repairTF = 1 ;
        }


    }
}
*/
