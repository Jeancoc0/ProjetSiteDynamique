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
            
            echo $Choix_cat;
            echo '<br/>';
            echo $Choix_marque;
            
            if ($Choix_cat=='none'){
                if ($Choix_marque=='none'){
                    header("location: VoirProduits.php?CC=0&CM=0");
                }
                else{
                    header("location: VoirProduits.php?CC=0&CM=".$Choix_marque);
                }
            }
            else if ($Choix_marque=='none'){
                header("location: VoirProduits.php?CC=".$Choix_cat."&CM=0");
            }
            else {
                header("location: VoirProduits.php?CC=".$Choix_cat."&CM=".$Choix_marque);
            }
            
        ?>
    </body> 
</html>