<?php
	include("../include/connexion.php");

	if (isset($_POST['Enregistrer'])) {

	$Prenom=$_POST['prenom'];
	$nom=$_POST['nom'];
	$adresse=$_POST['adresse'];
	$telephone=$_POST['telephone'];
	$datedenaissance=$_POST['datedenaissance'];
	$matricule=$_POST['Matricule'];
			$var ="UPDATE membres SET Nom=?, Prenom=?,Adresse=?,Telephone=?,datedenaissance=? WHERE Matricule=?";
		$resultat=$connexion->prepare($var);
		$resultat->execute([$nom,$Prenom,$adresse,$telephone,$datedenaissance,$matricule]);
		
		if ($resultat){
			header("location:../pages/Membres.php");
		}else{
			echo "error";
		}
	}
?>