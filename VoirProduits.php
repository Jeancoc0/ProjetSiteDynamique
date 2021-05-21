<?php
include 'connexion.php';


if(isset($_POST["Valider"])){ 
	

    $ref = rand();
    $libelle = mysqli_real_escape_string(connexion(), $_POST["libelle"]);
    $categorie = mysqli_real_escape_string(connexion(), $_POST["categorie"]);
    $marque = mysqli_real_escape_string(connexion(), $_POST["marque"]);
    $quantite = mysqli_real_escape_string(connexion(), $_POST["quantite"]);
    $prix = mysqli_real_escape_string(connexion(), $_POST["prix"]);
    $tva = mysqli_real_escape_string(connexion(), $_POST["tva"]);
    $description = mysqli_real_escape_string(connexion(), $_POST["description"]);

    $sql = "INSERT INTO produits (ref, libelle, categorie, marque, quantite, prix, tva, description)
	VALUES ('$ref', '$libelle', '$categorie', '$marque', '$quantite', '$prix', '$tva',  '$description')";
    
	if (mysqli_query(connexion(), $sql)) {
    	echo "Le produit a été ajouté  avec succès <br/>";
	} else {
    	echo "Erreur d'insertion <br/>" ;
	}


}
if(isset($_GET["message"])){
	$message=$_GET["message"];
        echo "<p style ='color:#ff0000'>" .$message . "</p>";
}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Liste des produits</title>
        <link rel="stylesheet" href="VoirProduits.css">
	<meta charset="utf-8">

</head>
<body>
    <div class="navig">
            <h3>Menu</h3>
            <a href="CreerProduit.php">Creer un produit</a>
            <a href="VoirProduits.php">Afficher les produits</a>
            <a href="">Voir les commentaires clients</a>
            <a href="">Deconnexion</a>
        
        </div>
        
        <h1>Liste des produits</h1>
      	<table border="1">
      	<tr>
      	<th>Ref</th>
      	<th>Libelle</th>
      	<th>Categorie</th>
      	<th>Marque</th>
      	<th>Quantite</th>
      	<th>Prix</th>
        <th>Description</th>
      	<th>Modifier</th>
        <th>Supprimer</th>
      	</tr>
      	
        
      	<?php
     	$sql = "SELECT * FROM produits";
	$result = mysqli_query(connexion(), $sql);
	if (mysqli_num_rows($result) > 0) {
    	while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$row["ref"]."</td>"
                . "<td>".$row["libelle"]."</td>"
                . "<td>".$row["categorie"]."</td>"
                . "<td>".$row["marque"]."</td>"
                . "<td>".$row["quantite"]."</td>"
                . "<td>".$row["prix"]."</td>"
                . "<td>".$row["description"]."</td>"
                . "<td><a href=modifProd.php?ref=".$row["ref"].">Modifier</a></td>"
                . "<td><a href=suppProd.php?ref=".$row["ref"].">Supprimer</a></td></tr>";
                //. "<td><input type='checkbox' name='Supprimer[]' value='".$row['ref']."'></td></tr>";
                
          }} 
	?>	
    </table> <br/>
</body>
<footer> <p class="ContactSociete"> Adresse : 54 rue de la mort      Tel : 06.06.06.06.06</p></footer>
</html>