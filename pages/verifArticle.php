<!--
Page crée le 19/12/2016 par Antoine Berenguer
Nom de la page : verifArticle
But de la page : Verification de la validité d'un article
-->

<?php
	session_start();
	$formulaireValide = true;
	if (( isset($_POST['titre']) AND empty($_POST['titre']) ) || ((strlen($_POST['titre'])) > 100)) {
		$formulaireValide = false;
		echo "Titre invalide! Vous devez renseigner un titre entre 1 et 100 caractères.<br />";
	}
	
	if (( isset($_POST['corps']) AND empty($_POST['corps']) ) || ((strlen($_POST['corps'])) > 10000)) {
		$formulaireValide = false;
		echo "Corps d'article invalide! Vous devez écrire un article entre 1 et 10000 caractères.<br />";
	}
	
	if ($_SESSION['connecte'] != true)
	{
		$formulaireValide = false;
		echo "Tu n'es pas connecté espèce de trash!";
	}
    
	if ( $formulaireValide == true )
	{
		$dbh = new PDO('mysql:host=localhost;dbname=ynsay', 'root', 'LRRH4H');
		$stmt = $dbh->prepare("INSERT INTO article (id_article, titre, contenu, id_utilisateur)
		VALUES (NULL, :titre, :contenu, :id_utilisateur)");
		$titre = $_POST['titre']; //On récupère le titre
		$corps = $_POST['corps']; //On récupère le corps de l'article
		$idUtilisateur = $_SESSION['id']; //On récupère l'ID de l'utilisateur pour le mettre comme auteur dans la base de données.
		$stmt->bindValue(':titre', $titre);
		$stmt->bindValue(':contenu', $corps);
		$stmt->bindValue(':id_utilisateur', $idUtilisateur);
		$stmt->execute(); //On insère l'article dans la base
		$idArticle = $dbh->lastInsertId(); //On récupère l'id de l'article, qui est actuellement le dernier rentré
		if(empty($tags)) //Si aucun tag sélectionné
		{
			$listeTags = "general"; //On applique le tag général
			$stmt = $dbh->prepare("INSERT INTO a_pour_tag (id_article, id_tag)
			VALUES (:id_article, 2)"); //le tag general a pour id 2.
			$stmt->bindValue(':id_article', $idArticle);
			$stmt->execute();
		}
		else //Sinon
		{
			/*Pas d'action sur la base de données car la page écriture ne permet pas encore de sélectionner des tags.
			TODO : gérer le cas où un tag ou plus sont sélectionnés*/
			$tags = $_POST['tag']; //Le tableau de tags est copié dans une variable
			$nbTags = count($tags); //On récupère le nombre de tags choisis
			for($i=0; $i < $nbTags; $i++) //On génère la liste de tags
			{
			  $listeTags = $listeTags.$tags[$i];
			  if ($i != $nbTags - 1)
			  {
				  $listeTags = $listeTags.", ";
			  }
			}
		}
		// Maintenant, on affiche l'article
		echo "<h1>".$titre."</h1>";
		echo "<p>".$corps."</p>";
		echo "<p> tag(s) : ".$listeTags."</p>";
	}
?>