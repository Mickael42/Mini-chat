<?php
include 'bddConnexion.php';
session_start();


$userName = $_POST['userName'];
$userPassword = $_POST['userPassword'];

//Données en SESSION
$_SESSION['userName']=$userName ;
$_SESSION['userPasword']=$userPassword ;

//Donnée enregistré en COOKIE
setcookie('userName', $userName, time() +3600);


// Enregistrement user dans BDD
$insertUser = $bdd->prepare(" INSERT INTO users(userName, userPasswords) 
                                VALUES(?,?)");
$insertUser->execute(array(     $userName, 
                                $userPassword, 
                                ));

//Redirection
header('Location: index.php');