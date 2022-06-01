<?php
$host="localhost";
$username="root";
$password="";
$dbname="tendre";
try{
	$connexion=new PDO ("mysql:host=$host;dbname=$dbname","$username","$password");
	/*echo "Connexion reuusi";
	*/
}
catch(PDOException $e){
	die("Echec de la conexion".$e->getMessage());
}

if(isset($_POST['Sauvegarder'])){
	$tant=$_POST['Montant'];
	$date=$_POST['datecotisation'];
	$motif=$_POST['motifcotisation'];
	$tricule=$_POST['matricule'];

	if(!empty($tant) && !empty($date)){
	
		$resultat=$connexion->prepare("INSERT INTO cotisations SET Montant=?,DateCotisation=?,MotifsCotisation=?,Matricule=?");
		$resultat->execute([$tant,$date,$motif,$tricule]);
		
		if ($resultat){
			header("location:Cotisations.php");
		}else{
			echo "error";
		}
	}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>h</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

</head>
<body>
<form action="AjoutCotisation.php" method="POST">

    <div class="container">
    	 <legend>Test </legend>
      <div class="form-group col-sm-6">
    <label for="Montant">Montant</label>
    <input type="number" class="form-control" id="Montant" name="Montant" placeholder="Enter votre Montant">
    
    <small id="Montant" class="form-text text-muted"></small>
  </div>
   <div class="form-group col-sm-6">
    <label for="datecotisation">date de cotisation</label>
    <input type="date" class="form-control" id="datecotisation" name="datecotisation" placeholder="date de cotisation">
  </div>
	
		 <div class="form-group col-sm-6">
    <label for="matricule">matricule</label>
    <input type="text" class="form-control" id="matricule" name="matricule" placeholder="matricule">
  </div>
  <label>Motif de cotisation </label><br>
		<select name="motifcotisation" id="motifcotisation" name="motifcotisation"class="container col-sm-6">
			<option value="Raison Sociale"> Raison Sociale</option>
			<option value="Mariage"> Mariage</option>
			<option value="Maladie"> Maladie</option>
			<option value="Autre "> Autre </option>
		</select> <br>
	<button type="submit" name="Sauvegarder" class="btn btn-primary mt-3">Submit</button> 
  <button type="reset" class="btn btn-danger mt-3 ml-5">test</button> <br>
</form>
	<link rel="stylesheet" type="text/css" href="../js/bootstrap.min.js">
</body>
</html>