

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
    	echo "Produit ajouté <br/>";
	} else {
    	echo "Erreur d'insertion <br/>" ;
	}


}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Liste des produits</title>
        <link rel="stylesheet" href="VoirProduits_.css">
	<meta charset="utf-8">

</head>
<header>
            <img src="logo.jpg">
            <p>Entreprise truc</p>
        </header>
<body>
    
   <div class="navig">
            <h3>Menu</h3>
            <a href="CreerProduit_.php">Creer un produit</a>
            <a href="VoirProduits.php">Afficher les produits</a>
            <a href="">Voir les commentaires clients</a>
            <a href="Deconnexion.php">Deconnexion</a>
        
        </div>

        <h1>Liste des produits</h1>
        <br/><br/>
        <form action="Choix_prod.php" method="POST">
                       
            <label for="categorie_choix">Categorie</label>
                <select name="categorie_choix" id="categorie_choix">
                    <option value="none">Toutes categories confondues</option>
                    <option value="PC">PC</option>
                    <option value="Imprimante">Imprimante</option>
                    <option value="Scanner">Scanner</option>
                </select>
            <label for="marque_choix">Marque</label>
                <select name="marque_choix" id="marque_choix">
                    <option value="none">Toutes marques confondues</option>
                    <option value="Dell">Dell</option>
                    <option value="Asus">Asus</option>
                    <option value="Mac">Mac</option>
                </select>
            
            <input type="submit" id="idenvoyer" value="Choisir" name="Choisir">
        <br/>
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
        
        
        if (!isset($_GET["CC"])||!isset($_GET["CM"])){
            echo '<h3>Seletion tout</h3>';
            $sql = "SELECT * FROM produits";
        }
        
        else if (isset($_GET["CC"])&&$_GET["CC"]==0){
            if (isset($_GET["CM"])&&$_GET["CM"]==0){//2 choix null
                echo '<h3>Seletion tout</h3>';
                $sql = "SELECT * FROM produits";
            }
            else{
                echo '<h3>Seletion '.$_GET["CM"].'</h3>';//choix cat null
                $sql = "SELECT * FROM produits WHERE marque = '".$_GET["CM"]."'";
        }}
        else if (isset($_GET["CM"])&&$_GET["CM"]==0){
                echo '<h3>Seletion '.$_GET["CC"].'</h3>';//choix marque null
                $sql = "SELECT * FROM produits WHERE categorie = '".$_GET["CC"]."'";
            }
        else {
            echo '<h3>Seletion '.$_GET["CC"].' '.$_GET["CM"].'</h3>';//choix double
            $sql = "SELECT * FROM produits WHERE categorie = '".$_GET["CC"]."' AND marque = '".$_GET["CM"]."'";
            }
        
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
                . "<td><a href=suppProd2.php?ref=".$row["ref"].">Supprimer</a></td></tr>";
                
                //. "<td><a href=suppProd2.php?ref=".$row["ref"]."quantite=".$row["quantite"].">Supprimer</a></td></tr>";
                //. "<td><input type='checkbox' name='Supprimer[]' value='".$row['ref']."'></td></tr>";
                
          }}
	?>	
        </table> <br/> 
</body>
    <footer> <p class="ContactSociete"> Adresse : 54 rue de la mort      Tel : 06.06.06.06.06</p></footer>
</html>
<?php
if(isset($_GET["message"])){
	$message=$_GET["message"];
        echo "<p style ='color:#ff0000'>" .$message . "</p>";
}
?>