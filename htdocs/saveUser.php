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
        echo '<div class="container">
                <div class="row col-12 align-items-center justify-content-center">
                    <div class=" col-9 form-group " >
                            <h4>Bienvenue <strong>'.$newUserName.'</strong> !</h4>
                            <a href="mainRoom.php"><button type="submit" class="buttonSubmit">Entrer dans le salon</button></a>
                    </div>
                </div>            
            </div>';



        $_SESSION['userName']=$newUserName ;
        $_SESSION['userPasword']=$newUserPassword ;
        
        // Enregistrement user dans BDD
        $insertUser = $bdd->prepare(" INSERT INTO users(userName, userPasswords) 
                                        VALUES(?,?)");
        $insertUser->execute(array(     $newUserName, 
                                        $newUserPassword, 
                                        ));


    }else {
       echo '
       <div class="container">
            <div class="row col-12 align-items-center justify-content-center text-align-center">
                <div class=" col-9 form-group " >
                        <h4>Quelqu\'a déjà pris ce blaze, va falloir changer!</h4>
                        <a href="index.php"><button type="submit" class="buttonSubmit">Retour à la page de connexion</button></a>
        
                </div>
            </div>
        </div>';
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

    echo '
    <div class="container">
    <div class="row col-12 align-items-center justify-content-center text-align-center">
        <div class=" col-9 form-group ">
                <h4>Tu t\'es planté dans le nom de ton blaze, recommence !</h4>
                <a href="index.php"><button type="submit" class="buttonSubmit">Retour à la page de connexion</button></a>

        </div>
    </div>
</div>';

    }else {
        echo '
        <div class="container">
        <div class="row col-12 align-items-center justify-content-center text-align-center">
            <div class=" col-9 form-group ">
                    <h4>Bienvenue <strong>'.$userName.'</strong> !</h4>
                    <a href="mainRoom.php"><button type="submit" class="buttonSubmit">Entrer dans le salon</button></a>

            </div>
            </div>
        </div>';
    
        $_SESSION['userName']=$userName ;
        $_SESSION['userPasword']=$userPassword ;
        
        }
                             
    }

?>

</body>
</html>






