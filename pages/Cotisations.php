<?php
$host="localhost";
$username="root";
$password="";
$dbname="tendre";
try{
    $connexion=new PDO ("mysql:host=$host;dbname=$dbname","$username","$password");
    #echo "Connexion reuusi";
}

catch(PDOException $e){
    die("Echec de la conexion".$e->getMessage());
}

$requete=$connexion->prepare("SELECT * FROM cotisations");
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
        <a href="../Traitements/AjoutCotisation.php" style="color: white;">ajout cotisation</a>
       </button>
    <table border="2" class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">ID :</th>
             <th scope="col">Montant:</th>
            <th scope="col">Date de Cotisation:</th>
            <th scope="col">Motif de Cotisation :</th>
            <th scope="col">Matricule :</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <?php foreach ($membres as $value):?>
            <td scope="row"><?php echo $value["ID"] ; ?></td>
            <td><?php echo $value["Montant"]." FCFA" ; ?></td>
            <td><?php echo $value["DateCotisation"] ; ?></td>
            <td><?php echo $value["MotifsCotisation"] ; ?></td>
            <td><?php echo $value["Matricule"] ; ?></td>   
        </tr>
    <?php endforeach ;?>
        </tbody>
    </table>
    <link rel="stylesheet" type="text/css" href="../js/bootstrap.min.js">
</body>
</html>