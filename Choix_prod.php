<?php
include 'connexion.php';
    
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
        
            $Choix_cat = $_POST['categorie_choix'];
            $Choix_marque = $_POST['marque_choix'];
            
            if ($Choix_cat=='cnone'){
                if ($Choix_marque=='mnone'){
                header("location: VoirProduits.php?message2=none_none");}
                else if ($Choix_marque=='Dell'){
                header("location: VoirProduits.php?message2=none_Dell");}
                else if ($Choix_marque=='Asus'){
                header("location: VoirProduits.php?message2=none_Asus");}
                else if ($Choix_marque=='Mac'){
                header("location: VoirProduits.php?message2=none_Mac");}
            }
            else if ($Choix_cat=='PC'){
                if ($Choix_marque=='mnone'){
                header("location: VoirProduits.php?message2=PC_none");}
                else if ($Choix_marque=='Dell'){
                header("location: VoirProduits.php?message2=PC_Dell");}
                else if ($Choix_marque=='Asus'){
                header("location: VoirProduits.php?message2=PC_Asus");}
                else if ($Choix_marque=='Mac'){
                header("location: VoirProduits.php?message2=PC_Mac");}
            }
            else if ($Choix_cat=='Imprimante'){
                if ($Choix_marque=='mnone'){
                header("location: VoirProduits.php?message2=Imprimante_none");}
                else if ($Choix_marque=='Dell'){
                header("location: VoirProduits.php?message2=Imprimante_Dell");}
                else if ($Choix_marque=='Asus'){
                header("location: VoirProduits.php?message2=Imprimante_Asus");}
                else if ($Choix_marque=='Mac'){
                header("location: VoirProduits.php?message2=Imprimante_Mac");}
            }
            else if ($Choix_cat=='Scanner'){
                if ($Choix_marque=='mnone'){
                header("location: VoirProduits.php?message2=Scanner_none");}
                else if ($Choix_marque=='Dell'){
                header("location: VoirProduits.php?message2=Scanner_Dell");}
                else if ($Choix_marque=='Asus'){
                header("location: VoirProduits.php?message2=Scanner_Asus");}
                else if ($Choix_marque=='Mac'){
                header("location: VoirProduits.php?message2=Scanner_Mac");}
            }
            else{}
        ?>
    </body> 
</html>