<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="../style/stylepub.css">
</head>

<body>
    <div class="container">
        <h1>Contactez-nous</h1>
        <form action="">
            <label for="fname">Nom & Prénom</label>
            <input type="text" id="fname" name="firstname" placeholder="Votre nom et prénom">

            <label for="sujet">Sujet</label>
            <input type="text" id="sujet" name="sujet" placeholder="L'objet de votre message">

            <label for="emailAddress">Email</label>
            <input id="emailAddress" type="email" name="email" placeholder="Votre adresse e-mail">


            <label for="subject">Message</label>
            <textarea id="subject" name="subject" placeholder="Votre message" style="height:200px"></textarea>

            <input type="submit" value="Envoyer">
        </form>
    </div>

</body>

</html>