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
    
	if ( $formulaireValide == true )
	{
		$titre = $_POST['titre']; //On récupère le titre
		$corps = $_POST['corps']; //On récupère le corps de l'article
		if(empty($tags)) //Si aucun tag sélectionné
		{
			$listeTags = "general"; //On applique le tag général
		}
		else //Sinon
		{
			$tags = $_POST['tag']; //Le tableau de tags est copié dans une variable
			$listeTags = ""; //On initialise une liste de tags pour l'affichage
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