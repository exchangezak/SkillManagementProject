<!DOCTYPE html>
<html lang="fr">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Skills de developpeur</title>
        <link rel="stylesheet" href="style.css">
</head>
<body class="pg">
        

</html>
<header>
<h1>Une App de qualité supérieur</h1>
</header>
<section >
    <h2>Connexion</h2>
    <form class="ajax" action="">
            <input type="textarea" name="userName" id="" cols="20" required placeholder="Nom d'utilisateur">
            <input type="password" name="password" required placeholder="Mot de passe">
            <button>Se connecter</button>
            <div class="confirmation"></div>
            <input type="hidden" name="methodeApi" value="login">
    </form>
</section>

<footer>
        <p>Tous droits réservés.</p>
</footer>
<script>
    var connexion ={};
    connexion.start = function()
    {
            var listeSelection = document.querySelectorAll('form.ajax');
            listeSelection.forEach(function(balise)
            {
                    balise.addEventListener('submit',connexion.cbAjax); //cb = call back
            });
    }

    connexion.cbAjax = function (event)
    {
            event.preventDefault();

            var formulaire = event.target;
            var formData = new FormData(formulaire);
            fetch('api.php',{
                    method: 'POST',
                    body: formData
            });
    }
    connexion.start();

</script>

</body>