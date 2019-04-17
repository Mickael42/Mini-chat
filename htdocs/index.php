<?php

include 'bddConnexion.php';
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
        <a href="" class="navbar-brand mx-auto d-block text-center order-0 order-md-1 w-100">TellMe.io</a>
</nav>



<div class="container">
    <div class="row col-12 align-items-center justify-content-center">
        <div class="colInscription col-5 form-group " >

            <form action="saveUser.php" method="post">
                <h4>Tu es nouveau? Inscris-toi !</h4>
                <input type="text" class="inputIndex form-control" placeholder="Identifiant" name="newUserName" required >
                <input type="password" placeholder="Mot de passe" class="inputIndex form-control" name="newUserPassword" required >
                <button type="submit" class="buttonSubmit" >Valider</button>
            </form>
        </div>

        <div class="colInscription col-5 offset-md-2 form-group ">

            <form action="saveUser.php" method="post">
                <h4>Déjà membre? Connecte-toi!</h4>
                <input type="text" placeholder="Votre identifiant"class="inputIndex form-control" name="userName" required >
                <input type="password" placeholder="Votre mot de passe" class="inputIndex form-control" name="userPassword" required >
                <button type="submit" class="buttonSubmit" >Valider</button> 
            </form>
        </div>
    </div>
</div>
</header>

</body>
</html>