<?php
include 'connexion.php';
if(connexion()) echo "connexion ok <br/>";
if(isset($_GET["ref"])){
    $refs = $_GET["ref"];
    $sql = "SELECT * FROM produits WHERE ref=$refs";
    $result = (mysqli_query(connexion(), $sql));
    $row = mysqli_fetch_assoc($result);
            if ($row["quantite"]==0){
            $sql = "DELETE FROM produits WHERE ref=$refs";
            
	if (mysqli_query(connexion(), $sql)) {
    	$message= "Le produit a été supprimé avec succés";
	} else {
        $message="Erreur pendant la suppression du produit: " . mysqli_error(connexion());}
    }
    else{$message="Le produit est toujours en stock";}
header("Location:VoirProduits.php?message=$message");
}


/*
<?php
include 'connexion.php';
if(connexion()) echo "connexion ok <br/>";
if(isset($_GET["ref"])){
    $refs = $_GET["ref"];
        $sql = "DELETE FROM produits WHERE ref=$refs";
 
	if (mysqli_query(connexion(), $sql)) {
    	$message= "Le produit a été supprimé avec succés";
	} else {
    	$message="Erreur pendant la suppression du produit: " . mysqli_error(connexion());
    }
   header("Location:VoirProduits.php?message=$message");
}
 * 
 * 
 */