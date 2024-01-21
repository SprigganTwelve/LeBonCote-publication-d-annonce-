<?php

include("../config/connectDb.php");
define("NUMBERS_PATTERN", "#[0-9]#");
define("SPECIAL_CHARS_PATTERN", "#[\$\.=\+_\[)(\}\{\@\^\/!ù\%\*~\:\;,\#\?£]#");


if (isset($_POST['submit'])) {

  $nom = trim($_POST['nom']);
  $prenom = trim($_POST['prenom']);
  $email = trim($_POST['email']);
  $password = md5($_POST['password']);

  $errorMessage = checkErrors($nom, $prenom, $email, $password, $connexion);

  if (thereAreErrors($errorMessage)) {
    mysqli_query($connexion, "INSERT INTO `utilisateurs`(nom,prenom,email,password) VALUES ('$nom','$prenom','$email','$password')") or die("Requête SQL échouée");
    header("Location:../connexion/connexion.php");
  }
}

function checkErrors($nom, $prenom, $email, $password, $connexion)
{
  $result = '';
  if (!empty($nom) && preg_match(NUMBERS_PATTERN, $_POST['nom']) === 1) {
    $result .= "<li>Pas de chiffres dans le nom</li>";
  }
  if (!empty($prenom) && preg_match(NUMBERS_PATTERN, $_POST["prenom"]) === 1) {
    $result .= "<li>Pas de chiffres dans le prénom</li>";
  }
  if (!empty($nom) && preg_match(SPECIAL_CHARS_PATTERN, $_POST['nom']) === 1) {
    $result .= "<li>Pas de caractères spéciaux dans le nom</li>";
  }
  if (!empty($nom) && preg_match(SPECIAL_CHARS_PATTERN, $_POST["prenom"]) === 1) {
    $result .= "<li>Pas de caractères spéciaux dans le prénom</li>";
  }
  if (!empty($prenom) && $_POST['password'] !== $_POST['passwordconfirm']) {
    $result .= "<li>Les mots de passe ne correspondent pas</li>";
  }
  $select = mysqli_query($connexion, "SELECT * FROM `utilisateurs` WHERE email='$email' AND password='$password'") or die("Requête SQL échouée");
  if (mysqli_num_rows($select) > 0) {
    $result .= '<li>Le compte utilisateur existe déjà</li>';
  }
  return $result;
}

function thereAreErrors($errorMessage)
{
  return $errorMessage === '';
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link rel="stylesheet" href="../style.css" />
</head>

<body>
  <div class="container">
    <form action="" method="POST">
      <strong class="title">S'inscrire</strong>

      <input type="text" name="nom" placeholder="Nom" value="<?php echo @$nom ?>" />
      <input type="text" name="prenom" placeholder="Prénom" value="<?php echo @$prenom ?>" />
      <input type="email" name="email" placeholder="Email" required value="<?php echo @$email ?>" />
      <input type="password" name="password" placeholder="Mot de passe" required />
      <input type="password" name="passwordconfirm" placeholder="Confirmer mot de passe" required />
      <input type="submit" id="send" name="submit" />
      <span class="account">Vous avez déja un compte ? <br />
        <a style="color: blue" href="http://localhost/PROJET/projectDB/connexion/connexion.php">se connecter</a>
      </span>

      <div id="link">
        <a href="">S'inscrire via Facebook ?</a>
        <a href="">S'inscrire via Google ?</a>
      </div>
    </form>

    <?php
    if (!empty($errorMessage)) {
      echo '<div class="errors">' . $errorMessage . '</div>';
    } ?>

  </div>
</body>

</html>