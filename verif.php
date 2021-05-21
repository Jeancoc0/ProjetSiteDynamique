<?php
session_start();
$_SESSION['Login'] = $_SESSION['Login']." ". $_POST['Login']." ";
$_SESSION['Mot_de_passe'] = $_SESSION['Mot_de_passe']. " ". $_POST['Mot_de_passe'] . " ";       
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
            $connect = mysqli_connect("127.0.0.1", "root", "","SiteWebDynamique");
            if($connect) {
                echo "connexion réussie <br/>";
            }
            else {
                echo "echec de connexion";
            }
            
            $Login = mysqli_real_escape_string($connect,$_POST['Login']);
            $Pass = $_POST['Mot_de_passe'];
            $Profil = $_POST['Profil'];
            
            $sql = "SELECT * FROM client WHERE Email = ?";
            $res = mysqli_prepare($connect,$sql);//Préparation de la requete
            
            $var = mysqli_stmt_bind_param($res, 's', $Login); //liaison des paramètres
            $var = mysqli_stmt_execute($res);

            if($var == FALSE) { 
                echo "echec de l'exécution de la requête.<br />";
            } 
            
            else if (mysqli_stmt_fetch($res)==FALSE){
                header("location: Authentification.php?message=Loginfaux");
            }
            
            else if (isset($Login)==FALSE || isset($Pass)==FALSE){
                header("location: Authentification.php?message=Vide");
            }
            else if ($Pass != 'Bonjourno'){
                header("location: Authentification.php?message=Passfaux");
            }
            else if (isset($Profil)==FALSE){
                header("location: Authentification.php?message=ProfilVide");
            }
            else {
                header("location: GestionCompteClient.php?Email=$Login");
            }  
        ?>
    </body> 
</html>