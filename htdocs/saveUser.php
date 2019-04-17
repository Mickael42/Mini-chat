<?php
include 'bddConnexion.php';
session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>HomePage|TellMe.io</title>
</head>
<body>
<header>

 <nav class="navbar navbar-dark navbar-expand-md bg-dark text-center  justify-content-between" >
        <a href="mainRoom.php" class="navbar-brand mx-auto d-block text-center order-0 order-md-1 w-100">TellMe.io</a>
</nav>
</header>


<?php

if ((isset($_POST['newUserName']))){

$newUserName = $_POST['newUserName'];
$newUserPassword = $_POST['newUserPassword'];


// POOUR LA PARTIE INSCRIPTION

//Verification que le userName n'existe pas dans la bdd
$req = $bdd->prepare('SELECT userName 
                            FROM users 
                            WHERE userName = ?'
                        );
$req->execute(array($newUserName));
$resultat = $req->fetch();


    if (empty($resultat)){
        echo '<p>Bienvenue '.$newUserName.'!</p>';
        echo "<a href='mainRoom.php'><button type='submit'>Entrer dans le salon</button></a>";


        $_SESSION['userName']=$newUserName ;
        $_SESSION['userPasword']=$newUserPassword ;
        
        // Enregistrement user dans BDD
        $insertUser = $bdd->prepare(" INSERT INTO users(userName, userPasswords) 
                                        VALUES(?,?)");
        $insertUser->execute(array(     $newUserName, 
                                        $newUserPassword, 
                                        ));


    }else {
       echo '<p>Cette identifiant existent déjà</p>';
       echo "<a href='index.php'><button type='submit'>Retour à la page de connexion</button></a>";
    }


}else {

// POUR LA PARTIE CONNEXION

$userName = $_POST['userName'];
$userPassword = $_POST['userPassword'];

//En plus de la verification de l'userName fait au dessus, on vérifie le password 

$req = $bdd->prepare('SELECT userName, userPasswords
                            FROM users 
                            WHERE userName = ? AND userPasswords= ?'
                        );                     
$req->execute(array($userName, $userPassword));
$reponse = $req->fetch();


if (empty($reponse)){

    echo "<p>Cette identifiant n'est pas reconnu, veuillez recommencer</p>";
    echo "<a href='index.php'><button type='submit'>Retour à la page de connexion</button></a>";

    }else {
        echo '<p>Bienvenue '.$userName.'!</p>';
        echo "<a href='mainRoom.php'><button type='submit'>Entrer dans le salon</button></a>";
    
    
        $_SESSION['userName']=$userName ;
        $_SESSION['userPasword']=$userPassword ;
        
        }
                             
    }

?>

</body>
</html>






