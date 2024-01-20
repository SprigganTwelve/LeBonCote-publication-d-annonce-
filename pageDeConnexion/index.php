<?php

if($_POST){
    include("connectDb.php");
    $query = mysqli_query("select * from connexion");
    $account = mysqli_fetch_assoc($query);
    while($information = $account){
        if($_POST['Email'] === rtrim(trim($information['adresse']))){
            if($_POST['Password']==md5(rtrim(trim($information['auth'])))){
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
    <link rel="stylesheet" href="style.css" />
    <title>Connection</title>
</head>
<body>
    <div class="container">

        <form action="" methode="POST">
            <strong class="title">Connectez vous !</strong>
       
            <input name="Email" type="email" placeholder="Adresse">
          
            <input name="Password" type="password" placeholder="password">
            <input type="submit">
            <a>Vous n'avez pas de compte?</a>
            <a> Mot de passe oublier ?</a>
            <div class=link>
                    <a>Google</a>
                    <a>Facebook</a>
                    <a>ink</a>
            </div>
        </form>
        <div class= "presentation">
           <strong> Bonne navigation </strong>
        </div>
    </div>
</body>
</html>

