<?php
include("../include/connexion.php");

if(isset($_GET['idsupp'])){
    $id = $_GET['idsupp'];

    $var = "DELETE FROM membres WHERE Matricule=?";
    $exec =  $connexion->prepare($var);
    $exec->execute([$id]);

    if($exec){
        header('Location:../pages/Membres.php');
    }else{
        echo "Echec de la suppression";
    }
}