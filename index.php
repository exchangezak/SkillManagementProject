<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <header>

    </header>
    <main>

    <section id="formulaire-contact">
        <h3>Completez le formulaire suivant pour ajouter une compétence: </h3>
        <form id="create" action="#formulaire-contact" method="POST">
            <label for="username">Entrez votre nom</label>
            <input type="text" name="username" required placeholder="Mohamed">
            <label for="text">Entrez le nom de la compétence à ajouter</label>
            <input type="text" name="skill" required placeholder="intelligence">
            <label for="text">Entrez le niveau de la compétence</label>
            <input type="text" name="level" placeholder="2">
            <input type="hidden" name="identifiantFormulaire" value="create">
            <button id="bouton" type="submit">Envoyez votre message</button>                
            <?php 
                //Affectation de la valeur "create" à la requête
                $identifiantFormulaire = $_REQUEST["identifiantFormulaire"] ?? "";
                if ($identifiantFormulaire == "create") {
                //Envoie du formulaire à la bdd
                require "crud/filtreformulaire.php";  
                }                      
            ?>
        </form>
    </section>

    <?php
    "<h1> titre </h1>";

    require_once "crud/crud.php";
    ?>

    </main>
    <footer>

    </footer>
</body>
</html>
