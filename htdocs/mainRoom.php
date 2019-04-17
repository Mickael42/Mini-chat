<?php
include 'bddConnexion.php';
session_start();

//récupération des données de la bdd messages filter par l'idUser

$req = $bdd->query('SELECT * FROM users
                        INNER JOIN messages
                        WHERE users.id = messages.idUser');
$messagesById = $req->fetchAll();


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
        <nav class="navbar navbar-dark navbar-expand-md bg-dark justify-content-between">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-nav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                    <div class="navbar-collapse collapse dual-nav w-50 order-1 order-md-0">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link pl-0" href="mainRoom.php">Accueil<span class="sr-only">Home</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="modificationProfil.php">Profil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="deconnexionUser.php">Déconnexion</a>
                            </li>
                        
                        </ul>
                    </div>
                        <a href="mainRoom.php" class="navbar-brand mx-auto d-block text-center order-0 order-md-1 w-25">TellMe.io</a>
                    <div class="navbar-collapse collapse dual-nav w-50 order-2">
                    </div>
            </div>
        </nav>
    </header>
    <div class="tchat container">
        <div class="row">
            <div class=" card text-white bg-secondary " style="width: 70rem; margin : 20px; margin-top : 50px;">
                <div class="card-header"> <h5 class="tchatTitle card-title">Bienvenue dans le salon de TellMe.io <strong> <?php echo @$_SESSION['userName']?></strong></h5></div>
                    <div class="tchatMessages card-body">
                        <?php
                        //boucle d'affichage des messages
                        foreach ($messagesById as $messageById) {
                            echo "<p class='card-text'><em>".$messageById['dateAndTime']."</em> <strong>".$messageById['userName']."</strong>"."    ". $messageById['userMessages']."</p>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="formMessage container">
    <div class="row col-12 align-items-center justify-content-center">
        <div class="colInscription col-5 form-group " >
            <form action="sendMessage.php" method="post">  
                <label for="userMessage" class="labelMessage">Tape ton message : </label>
                <input type="text" name="userMessage" class="buttonSubmit" id="" placeholder="">
            </form> 
        </div>
    </div>
</div>



</body>
</html>
