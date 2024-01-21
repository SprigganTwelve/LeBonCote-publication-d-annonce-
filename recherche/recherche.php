<?php
include("../config/connectDb.php");
$search = trim($_POST['search']);
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche</title>
    <link rel="stylesheet" href="../style/recherche.css">
</head>

<body>
    <header>
        <form action="" method="post">
            <a class="logo" href="../home/index.html"><span>LeBonCôté</span></a>
            <input name="search" class="search" placeholder="Rechercher sur LebonCôté">
            <input type="submit" id="send" name="submit" value="RECHERCHER">
        </form>
    </header>
    <div class="container">
        <div class="filter">
            <select name="tri" id="tri">
                <option value="">Tri</option>
                <option value="croissant">Prix croissants</option>
                <option value="decroissant">Prix décroissants</option>
                <option value="ancien">Plus anciennes</option>
                <option value="rcent">Plus récentes</option>
            </select>
            <select name="categorie" id="categorie">
                <option value="">Catégorie</option>
                <option value="vehicule">Vehicules</option>
                <option value="electronique">Electronique</option>
                <option value="immobilier">Immobilier</option>
            </select>
            <button>FILTRER</button>
        </div>
        <div class="sections">
            <section>
                <div class="user">
                    <img src="../image/avatar.jpg">
                    <span>ryomen</span>
                </div>
                <img class="photo" src="../image/nintendo_switch2.jpg">
                <span class="titre">Nintendo switch fonctionne bien</span>
                <span class="prix">200 €</span>
                <span class="date">21/01/2024</span>
            </section>

        </div>
    </div>

</body>

</html>