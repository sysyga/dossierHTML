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