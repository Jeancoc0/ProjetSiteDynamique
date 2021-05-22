<?php
function connexion(){
    $connect = mysqli_connect("localhost","root","","GestionProduits");
    if($connect) return $connect;
    else return null;
}
?>

