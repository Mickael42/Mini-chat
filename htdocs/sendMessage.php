<?php
//connexion à la base de donnée
include 'bddConnexion.php';
session_start();


//Récupération de l'id de User via la donnée en session
$reponse = $bdd->query('SELECT * FROM users
                        WHERE userName = "'.$_SESSION['userName'].'"');
$reponseUserName = $reponse->fetch();

//Variable id et message utilisé pour l'envoi du message
$userID=$reponseUserName['id'];
$message = $_POST['userMessage'];


//envoi du message dans BDD
$sendMessage = $bdd->prepare(" INSERT INTO messages (userMessages,idUser) 
                                VALUES (?,?)");
$sendMessage->execute(array($message , $userID));

//Redirection
header('Location: mainRoom.php'); 
