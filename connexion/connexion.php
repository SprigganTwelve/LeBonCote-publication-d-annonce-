<?php
include("../config/connectDb.php");
session_start();
$user_id = $_SESSION['user_id'];
if (isset($user_id)) {
    header('Location:../moncompte/mon_compte.php');
}

if (isset($_POST['submit'])) {

    $email = trim($_POST['email']);
    $password = md5($_POST['password']);

    $select = mysqli_query($connexion, "SELECT * FROM `utilisateurs` WHERE email='$email' AND password='$password'") or die("Requête SQL échouée");
    if (mysqli_num_rows($select) > 0) {
        $row = mysqli_fetch_assoc($select);
        $_SESSION['user_id'] = $row['id'];
        header("location:../moncompte/mon_compte.php");
    } else {
        $errorMessage = "Mot de passe et/ou compte incorrects";
    }
}



?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css" />
    <title>Connection</title>
</head>

<body>
    <a class="logo" href="../home/index.php">LeBonCôté</a>
    <div class="container">
        <form action="" method="post">
            <strong class="title">Connectez vous !</strong>

            <?php if (isset($errorMessage)) {
                echo '<div 
                style="background-color:red; 
                color:white; border-radius: 5px; padding: 5px">'
                    . $errorMessage . '</div>';
            } ?>

            <input name="email" type="email" placeholder="Email" required value="<?php echo @$email ?>">
            <input name="password" type="password" placeholder="Mot de passe" required>
            <input type="submit" id="send" name="submit" value="Envoyer">
            <a style="color: blue" href="../inscription/inscription.php">Vous n'avez pas
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