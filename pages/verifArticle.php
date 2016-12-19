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
		$titre = $_POST['titre'];
		$corps = $_POST['corps'];
		if(empty($tags))
		{
			$listeTags = "general";
		}
		else
		{
			$tags = $_POST['tag'];
			$listeTags = "";
			$nbTags = count($tags);
			for($i=0; $i < $nbTags; $i++)
			{
			  $listeTags = $listeTags.$tags[$i];
			  if ($i != $nbTags - 1)
			  {
				  $listeTags = $listeTags.", ";
			  }
			}
		}
		echo "<h1>".$titre."</h1>";
		echo "<p>".$corps."</p>";
		echo "<p> tag(s) : ".$listeTags."</p>";
	}
?>