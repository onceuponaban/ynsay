<fieldset>
    <?php
        try 
        {
            $dbh = new PDO('mysql:host=localhost;dbname=ynsay', 'root', '');
            $resultat = $dbh->query("SELECT id_tag, nom_tag, description_tag FROM tag");
            $check = $resultat->fetch(PDO::FETCH_NUM);
            if ($check == true) 
            {
                echo '<table>';
                $descriptionAv = "";
                foreach ($resultat as $ligne) 
                {
                    $nom = $ligne['nom_tag'];
                    $id = $ligne['id_tag'];
                    $description = $ligne['description_tag'];
                    
                    if($description !== $descriptionAv)
                    {
                        if($descriptionAv !== "")
                        {
                            echo"</tr>";
                        }
                        echo "<tr>";
                    }                    
                    echo"<td><input type=\"checkbox\" id=$id value=$nom><label for=$id>$nom</label></td>";
                    $descriptionAv = $description;
                }
                echo '</table>';
            }
        } catch (PDOExeption $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    ?>
</fieldset>