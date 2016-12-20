<?php 

	header("Content-Type: text/plain");
        
	$pseudo = (isset($_GET["pseudo"])) ? $_GET["pseudo"] : NULL; 
	$mdp = (isset($_GET["mdp"])) ? $_GET["mdp"] : NULL; 
        
	if ($pseudo && $mdp != NULL) 
        { 
            echo "OK";
	} else 
            { 
		echo "FAIL"; 
            } 
?>  


