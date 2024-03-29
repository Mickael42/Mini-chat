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
    <title>Déconnexion|TellMe.io</title>
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




<div class="container">
    <div class="modif row col-12 align-items-center justify-content-center">
        <div class=" col-6 form-group" >

            <form action="saveModifProfil.php" method="POST">   
                <h4>Si tu veux changer ton nom d'utilisateur ou ton mot de passe, remplis ces champs!</h4>
                <input type="text" name="newUserName" class="inputIndex form-control" value="<?php echo $_SESSION['userName']?>"required>
                <input type="text" name="newUserPassword" class="inputIndex form-control" value="" placeholder ="Mot de passe"required>
                <button type="submit" class="buttonSubmit" >Valider</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>