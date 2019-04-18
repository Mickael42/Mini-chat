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
    <title>modificationProfil|TellMe.io</title>
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
<?php

//Récupération de l'id de User via la donnée en session
$reponse = $bdd->query('SELECT * FROM users
                        WHERE userName = "'.$_SESSION['userName'].'"');
$reponseUserName = $reponse->fetch();

//Variable id et message utilisé pour l'envoi du message
$userID=$reponseUserName['id'];

//récupération des données post dans modificationProfil
$changeName = $_POST['newUserName'];
$changePassword = $_POST['newUserPassword'];


//préparation de la requête de modification
$req = $bdd->prepare("UPDATE users
                      SET userName = ?, userPasswords=?
                      WHERE id = ?");
//remplacement des ? de la requête SQL par les données récuperé du formulaire

$req->execute(array($changeName, $changePassword, $userID));

?>

<p></p>
<div class="container">
    <div class="modif row col-12 align-items-center justify-content-center">
        <div class=" col-6 form-group" >
                <h4>C'est modifié !</h4>
                <a href="mainRoom.php"><button type="submit" class="buttonSubmit">Retourner au salon</button></a>
            </form>
        </div>
    </div>
</div>



</body>
</html>