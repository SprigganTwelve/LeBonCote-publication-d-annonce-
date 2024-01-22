<?php

include('../config/connectDb.php');
session_start();

$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
    header('Location:../connexion/connexion.php');
}

if (isset($_POST['submit'])) {

    $titre = $_POST['titre'];
    $prix = $_POST['prix'];
    $categorie = $_POST['categorie'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $imagepath = $_FILES['image']['tmp_name'];
    $imagesize = $_FILES['image']['size'];

    $query = mysqli_query($connexion, "INSERT INTO annonces(user_id,titre,prix,categorie,description,date_publication,image) VALUES($user_id,'$titre',$prix,'$categorie','$description',NOW(),'$image');") or die("Requete échouée");

    if ($imagesize > 5000000) {
        $errorMessage = "L'image ne doit pas excéder 5 MB";
    } else {
        move_uploaded_file($imagepath, "../image/" . $image);
    }
    header("Location:../recherche/recherche.php");

}




?>








<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publication</title>
    <link rel="stylesheet" href="../style/stylepub.css">
</head>

<body>


    <a href="../home/index.php" class="logo">LeBonCôté</a>

    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <strong class="title">Publication</strong>
            <input type="text" name="titre" placeholder="Titre">

            <?php if (isset($errorMessage)) {
                echo '<div 
                style="background-color:red; 
                color:white; border-radius: 5px; padding: 5px">'
                    . $errorMessage . '</div>';
            } ?>

            <input type="number" name="prix" placeholder="Prix">

            <select name="categorie" id="categorie">
                <option value="">Catégorie</option>
                <option value="vehicule">Vehicules</option>
                <option value="electronique">Electronique</option>
                <option value="immobilier">Immobilier</option>
            </select>

            <textarea type="text" name="description" placeholder="Description(500mots)"
                style="height:170px;font-size:20px"> </textarea>

            <label for="image" id="file">Ajouter une image</label>
            <input type="file" id="image" name="image" style="display:none" accept="image/png, image/jpeg, image/jpg">

            <input id="submit" type="submit" name="submit" value="Envoyer">

        </form>
    </div>

</body>

</html>