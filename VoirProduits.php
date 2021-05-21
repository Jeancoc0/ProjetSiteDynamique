

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
            <a href="Deconnexion.php">Deconnexion</a>
        
        </div>

        <h1>Liste des produits</h1>
        
        <form action="Choix_prod.php" method="POST">
                       
            <label for="categorie_choix">Categorie</label>
                <select name="categorie_choix" id="categorie_choix">
                    <option value="cnone">Toutes categories confondues</option>
                    <option value="PC">PC</option>
                    <option value="Imprimante">Imprimante</option>
                    <option value="Scanner">Scanner</option>
                </select>
            <label for="marque_choix">Marque</label>
                <select name="marque_choix" id="marque_choix">
                    <option value="mnone">Toutes marques confondues</option>
                    <option value="Dell">Dell</option>
                    <option value="Asus">Asus</option>
                    <option value="Mac">Mac</option>
                </select>
            
            <input type="submit" id="idenvoyer" value="Choisir" name="Choisir">
        <br/><br/><br/>
        </form> 
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
        
     	if (isset($_GET["message2"])&&$_GET["message2"]=='none_none'){
            echo '<h3>Seletion tout</h3>';
            $sql = "SELECT * FROM produits";}
            else if (isset($_GET["message2"])&&$_GET["message2"]=='none_Dell'){
            echo '<h3>Seletion Dell</h3>';
            $sql = "SELECT * FROM produits WHERE marque = 'Dell'";}
            else if (isset($_GET["message2"])&&$_GET["message2"]=='none_Asus'){
            echo '<h3>Seletion Asus</h3>';
            $sql = "SELECT * FROM produits WHERE marque = 'Asus'";}
            else if (isset($_GET["message2"])&&$_GET["message2"]=='none_Mac'){
            echo '<h3>Seletion Mac</h3>';
            $sql = "SELECT * FROM produits WHERE marque = 'Mac'";}
        
        else if (isset($_GET["message2"])&&$_GET["message2"]=='PC_none'){
            echo '<h3>Seletion PC</h3>';
            $sql = "SELECT * FROM produits WHERE categorie = 'PC'";}
            else if (isset($_GET["message2"])&&$_GET["message2"]=='PC_Dell'){
            echo '<h3>Seletion PC Dell</h3>';
            $sql = "SELECT * FROM produits WHERE categorie = 'PC' AND marque = 'Dell'";}
            else if (isset($_GET["message2"])&&$_GET["message2"]=='PC_Asus'){
            echo '<h3>Seletion PC Asus</h3>';
            $sql = "SELECT * FROM produits WHERE categorie = 'PC' AND marque = 'Asus'";}
            else if (isset($_GET["message2"])&&$_GET["message2"]=='PC_Mac'){
            echo '<h3>Seletion PC Mac</h3>';
            $sql = "SELECT * FROM produits WHERE categorie = 'PC' AND marque = 'Mac'";}
            
        else if (isset($_GET["message2"])&&$_GET["message2"]=='Imprimante_none'){
            echo '<h3>Seletion Imprimante</h3>';
            $sql = "SELECT * FROM produits WHERE categorie = 'Imprimante'";}
            else if (isset($_GET["message2"])&&$_GET["message2"]=='Imprimante_Dell'){
            echo '<h3>Seletion Imprimante Dell</h3>';
            $sql = "SELECT * FROM produits WHERE categorie = 'Imprimante' AND marque = 'Dell'";}
            else if (isset($_GET["message2"])&&$_GET["message2"]=='Imprimante_Asus'){
            echo '<h3>Seletion Imprimante Asus</h3>';
            $sql = "SELECT * FROM produits WHERE categorie = 'Imprimante' AND marque = 'Asus'";}
            else if (isset($_GET["message2"])&&$_GET["message2"]=='Imprimante_Mac'){
            echo '<h3>Seletion Imprimante Mac</h3>';
            $sql = "SELECT * FROM produits WHERE categorie = 'Imprimante' AND marque = 'Mac'";}
           
        else if (isset($_GET["message2"])&&$_GET["message2"]=='Scanner_none'){
            echo '<h3>Seletion Scanner</h3>';
            $sql = "SELECT * FROM produits WHERE categorie = 'Scanner'";}
            else if (isset($_GET["message2"])&&$_GET["message2"]=='Scanner_Dell'){
            echo '<h3>Seletion Scanner Dell</h3>';
            $sql = "SELECT * FROM produits WHERE categorie = 'Scanner' AND marque = 'Dell'";}
            else if (isset($_GET["message2"])&&$_GET["message2"]=='Scanner_Asus'){
            echo '<h3>Seletion Scanner Asus</h3>';
            $sql = "SELECT * FROM produits WHERE categorie = 'Scanner' AND marque = 'Asus'";}
            else if (isset($_GET["message2"])&&$_GET["message2"]=='Scanner_Mac'){
            echo '<h3>Seletion Scanner Mac</h3>';
            $sql = "SELECT * FROM produits WHERE categorie = 'Scanner' AND marque = 'Mac'";}
        
        
        else if (!isset($_POST["categorie_choix"])){
            echo '<h3>Seletion tout</h3>';
            $sql = "SELECT * FROM produits";}
        
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
                . "<td><a href=suppProd?ref=".$row["ref"].">Supprimer</a></td></tr>";
                //. "<td><input type='checkbox' name='Supprimer[]' value='".$row['ref']."'></td></tr>";
                
          }}
	?>	
        </table> <br/> 
</body>

</html>