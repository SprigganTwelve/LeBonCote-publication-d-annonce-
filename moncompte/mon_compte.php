<?php
include("../config/connectDb.php");

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location:../connexion/connexion.php');
}


?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Compte</title>
</head>

<body>
    <div>MON COMPTE</div>
    <span><a href="../recherche/recherche.php">RECHERCHE</a></span>
    <span><a href="logout.php">Se déconnecter</a></span>
</body>

</html>