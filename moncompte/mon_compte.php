<?php
include("../config/connectDb.php");

session_start();

$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
    header('Location:../connexion/connexion.php');
}

$query = mysqli_query($connexion, "SELECT * from `utilisateurs` WHERE id=$user_id") or die("Requete échouée");
$row = mysqli_fetch_array($query);
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Compte</title>
</head>

<body>
    <div>MON COMPTE</div>
    <h1>
        <?php echo $row["nom"] . " " . $row["prenom"] ?>
    </h1>
    <span><a href="../recherche/recherche.php">RECHERCHE</a></span>
    <span><a href="update/update.php">METTRE A JOUR VOTR COMPTE ?</a></span>
    <span><a href="logout.php">Se déconnecter</a></span>
</body>

</html>