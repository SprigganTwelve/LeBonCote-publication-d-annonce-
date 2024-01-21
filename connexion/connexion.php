<?php
include("../config/connectDb.php");


if ($_POST) {

    $query = mysqli_query($connexion, "select * from connexion");
    $account = mysqli_fetch_assoc($query);
    while ($information = $account) {
        if ($_POST['email'] === trim($information['adresse'])) {
            if ($_POST['password'] == md5(trim($information['auth']))) {
                header("location:");
            }
        }
    }
}



?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css" />
    <title>Connection</title>
</head>

<body>
    <div class="container">
        <form action="" methode="POST">
            <strong class="title">Connectez vous !</strong>
            <input name="email" type="email" placeholder="Email">
            <input name="password" type="password" placeholder="Mot de passe">
            <input type="submit" name="submit" id="send">
            <a style="color: blue" href="http://localhost/PROJET/projectDB/inscription/inscription.php">Vous n'avez pas
                de compte ?</a>
            <a style="color: blue" href="">Mot de passe oublié ?</a>
            <div id="link">
                <a href="">Se connecter via Facebook ?</a>
                <a href="">Se connecter via Google ?</a>
            </div>
        </form>
    </div>
</body>

</html>