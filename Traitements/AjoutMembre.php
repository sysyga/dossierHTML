<?php
$host="localhost";
$username="root";
$password="";
$dbname="argent";
try{
	$connexion=new PDO ("mysql:host=$host;dbname=$dbname","$username","$password");
	/*echo "Connexion reuusi";
	*/
}
catch(PDOException $e){
	die("Echec de la conexion".$e->getMessage());
}

if(isset($_POST['Enregistrer'])){
	$Prenom=$_POST['prenom'];
	$nom=$_POST['nom'];
	$adresse=$_POST['adresse'];
	$telephone=$_POST['telephone'];
	$datedenaissance=$_POST['datedenaissance'];

	if(!empty($Prenom) && !empty($nom)){
		//  echo " votre nom est :".$nom."<br>";
		// echo "  votre prenom est : ".$Prenom ."<br>"; 
		//  echo"  votre date de naissance est :".$datedenaissance ."<br>";
		//   echo"  votre numero de telephone est :".$telephone."<br>"; 
		//   echo"  votre adresse est :".$adresse."<br>";
		 $var="INSERT INTO membres SET Nom=?, Prenom=?,Adresse=?,Telephone=?,datedenaissance=?";
		$resultat=$connexion->prepare($var);
		$resultat->execute([$nom,$Prenom,$adresse,$telephone,$datedenaissance] );
		
		if ($resultat){
			header("location:../pages/Membres.php");
		}else{
			echo "error";
		}
	}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

</head>
<body>
	<form action="AjoutMembre.php" method="POST">
  <div class="container">
  <legend>Formulaire à remplir </legend>
  <div class="form-group col-sm-6">
    <label for="Prenom">Prenom</label>
    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Enter votre Prenom">
    
    <small id="prenom" class="form-text text-muted"></small>
  </div>
  <div class="form-group col-sm-6">
    <label for="Nom">Nom</label>
    <input type="text" class="form-control" id="nom" name="nom" placeholder="votre Nom">
  </div>
  <div class="form-group col-sm-6">
    <label for="Adresse">Adresse</label>
    <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Adresse">
  </div>
  <div class="form-group col-sm-6">
    <label for="Date de naissance">Date de naissance</label>
    <input type="Date" class="form-control" id="datedenaissance" name="datedenaissance" placeholder="votre Date de naissance">
  </div>
  <div class="form-group col-sm-6">
    <label for="Telephone">Telephone</label>
    <input type="text" class="form-control" id="telephone" name="telephone" placeholder="votre numero">
  <button type="submit"name="Enregistrer" class="btn btn-primary mt-3">Submit</button> 
  <button type="reset" class="btn btn-danger mt-3 ml-5">test</button> <br>
</form>
	<link rel="stylesheet" type="text/css" href="../js/bootstrap.min.js">


</body>
</html>