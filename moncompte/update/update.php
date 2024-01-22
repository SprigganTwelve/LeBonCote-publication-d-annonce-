<?php

include('../../config/connectDb.php');

session_start();
$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
    header('Location:../connexion/connexion.php');
}

if (isset($_POST['submit'])) {



    $nom = $_POST["nom"];
    $adresse = $_POST["email"];
    $password = md5($_POST["password"]);
    $prenom = ($_POST['prenom']);
    $passwordConfirm = md5($_POST["passwordConfirm"]);
    if ($password === $passwordConfirm) {
        $execute = mysqli_query($connexion, " UPDATE   `utilisateurs`  SET nom ='$nom', prenom='$prenom', email ='$adresse', password='$password'
    WHERE id = $user_id  ");
        echo "Reussie";
        header("location:../../home/index.php");
    }

}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion du compte</title>
    <link rel="stylesheet" href="../../style/update.css">
</head>

<body>
    <a class="logo" href="../../home/index.php">LeBonCôté</a>

    <nav>
        <ul>

            <li><a href="../../recherche/recherche.php">Recherches</a></li>
            <li><a href="../../publication/publication.php">Mes Publications</a></li>
        </ul>
    </nav>

    <div class="container">
        <form action="" method="post">
            <h1>Gestion du compte</h1>
            <div class="form-group">
                <label for="prenom">Nom:</label>
                <input type="text" id="username" name="nom" value="<?php echo @$_POST['nom'] ?>">
            </div>


            <div class="form-group">
                <label for="username">Prenom:</label>
                <input type="text" id="username" name="prenom" value="<?php echo @$_POST['prenom'] ?>">
            </div>




            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo @$_POST['email'] ?>">
            </div>
            <div class="form-group">
                <label for="password">Nouveau mot de passe:</label>
                <input type="password" name="password" id="password">
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirmer mot de passe:</label>
                <input type="password" name="passwordConfirm" id="confirm-password">
            </div>
            <input id="save-changes" type="submit" name="submit" value="Sauvegarder les changements">
    </div>
    </form>
    <script src="testing2.js"></script>
</body>

</html>