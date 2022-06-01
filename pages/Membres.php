<?php
include("../include/connexion.php");

$requete=$connexion->prepare("SELECT * FROM membres");
$requete->execute();
$membres=$requete->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <title>ministere de l'éducation</title>
    <link rel="stylesheet" href="../style/Tendre.css">
</head>
<body>
 <nav>
     <ul class ="nav-list"> 
        <li class = "nav-item"><a href="../index.php">Accueil</a></li>
        <li class = "nav-item"><a href="Membres.php">Membres</a></li>
        <li class = "nav-item"><a href="Cotisations.php">Cotisations</a></li>
        <li class = "nav-item"><a href="Aide.php">Aide</a></li>
    </ul>
    </nav>
       <button type="button" class="btn btn-primary mb-4">
        <a href="../Traitements/AjoutMembre.php" style="color: white;">ajout membre</a>
       </button>
      <table border="2" class="table">
        <thead  class="thead-dark">
        <tr>
            <th scope="col">Matricule :</th>
             <th scope="col">Noms :</th>
            <th scope="col">Prenoms:</th>
            <th scope="col">Adresse :</th>
            <th scope="col">Telephone :</th>
            <th scope="col">Date de Naissance :</th> 
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <?php foreach ($membres as $value):?>
            <td scope="row"><?php echo $value["Matricule"] ; ?></td>
            <td><?php echo $value["Nom"] ; ?></td>
            <td><?php echo $value["Prenom"] ; ?></td>
            <td><?php echo $value["Adresse"] ; ?></td>
            <td><?php echo $value["Telephone"] ; ?></td>
            <td><?php echo $value["datedenaissance"] ; ?></td> 
            <td>
                <button class="btn btn-outline-primary">
                    <a href="modifierMembre.php?idmodifier=<?php echo $value['Matricule'];?>">Edit</a>
                </button>
                <button class="btn btn-outline-primary">
                    <a href="../Traitements/supprimerMembre.php?idsupp=<?php echo $value['Matricule'];?>">Delete</a>
                </button>
            </td> 
        </tr>
    <?php endforeach ;?>
        </tbody>
    </table>
       
       <link rel="stylesheet" type="text/css" href="../js/bootstrap.min.js">

</body>
</html>