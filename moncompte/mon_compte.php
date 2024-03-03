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
    <link rel="stylesheet" href="../style/style.css">
    <title>Mon Compte</title>
</head>

<body>


    <a href="../home/index.php" class="logo"><span>LeBonCôté</span></a>
    <ul class="changeDirectory">

        <li><a href="./update/update.php">Mettre à jour mon profil</a></li>
        <li><a href="../recherche/recherche.php">Recherche</a></li>
        <li><a href="../publication/publication.php">Publier</a></li>
    </ul>

    <div class="container">

        <h1 class="profileHead">Profile </h1>
        <div class=" selfItems">

            <div class='left'>
                <img class="profile-avatar" src="../image/avatar.jpg" alt="Avatar">
                <strong class="title" style="color:white">
                    <?= $row['nom'] ?>
                </strong>
            </div>

            <div class="infoAboutYou">

                <strong class="title">Informmation</strong>

                <div class='aboutYou'>
                    <div>
                        <p>
                            Email</br>
                        <h2>
                            <?= $row['email'] ?>
                        </h2>
                        </p>
                    </div>

                    <div>
                        <p>
                            Phone</br>
                        <h2>
                            Aucun
                        </h2>
                        </p>
                    </div>
                </div>

                <strong>Projects</strong>

                <div class="foot">
                    <div>
                        <strong>Recent</strong>
                        <p>
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium corporis nostrum
                            repellat
                            aspernatur
                            alias ad voluptas? Officia dolorum accusantium cum explicabo porro. Placeat aperiam in,
                            doloribus
                            blanditiis
                            fugit labore rem.
                        </p>
                    </div>
                    <div>
                        <strong>Most viewed </strong>
                        <p>
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium corporis nostrum
                            repellat
                            aspernatur
                            alias ad voluptas? Officia dolorum accusantium cum explicabo porro. Placeat aperiam in,
                            doloribus
                            blanditiis
                            fugit labore rem.
                        </p>
                    </div>
                </div>

            </div>

        </div>
        <footer>
            <ul>
                <li><a href="logout.php">Se Déconnecter</a></li>
            </ul>
        </footer>
    </div>

    <?php

    ?>
</body>

</html>