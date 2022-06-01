<?php
include("../include/connexion.php");

$id = $_GET['idmodifier'];

$requete=$connexion->prepare("SELECT * FROM membres WHERE Matricule=?");
$requete->execute([$id]);
$membres=$requete->fetch();

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
      <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

</head>
<body>
    <form action="../Traitements/Modifiermembre.php" method="POST">
  <div class="container">
  <legend>Formulaire à remplir </legend>
  <div class="form-group col-sm-6">
    <label for="Prenom">Prenom</label>
    <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $membres['Prenom']?>" placeholder="Enter votre Prenom">
    
    <small id="prenom" class="form-text text-muted"></small>
  </div>
  <div class="form-group col-sm-6">
    <label for="Nom">Nom</label>
    <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $membres['Nom']?>" placeholder="votre Nom">
  </div>
  <div class="form-group col-sm-6">
    <label for="Adresse">Adresse</label>
    <input type="text" class="form-control" id="adresse" name="adresse" value="<?php echo $membres['Adresse']?>" placeholder="Adresse">
  </div>
  <div class="form-group col-sm-6">
    <label for="Date de naissance">Date de naissance</label>
    <input type="Date" class="form-control" id="datedenaissance" name="datedenaissance" value="<?php echo $membres['datedenaissance']?>" placeholder="votre Date de naissance">
  </div>
  <div class="form-group col-sm-6">
    <label for="Telephone">Telephone</label>
    <input type="text" class="form-control" id="telephone" name="telephone" value="<?php echo $membres['Telephone']?>"placeholder="votre numero">
  </div>
  <div class="form-group col-sm-6">
    <label for="Matricule">Matricule</label>
    <input type="text" class="form-control" id="Matricule" name="Matricule" value="<?php echo $membres['Matricule']?>" desabled placeholder="">
  </div>
  <button type="submit" name="Enregistrer" class="btn btn-primary mt-3">Submit</button> 
  <button type="reset" class="btn btn-danger mt-3 ml-5">test</button> <br>
</form>

    <link rel="stylesheet" type="text/css" href="../js/bootstrap.min.js">


</body>
</html>