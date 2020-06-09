<!DOCTYPE html>
<html lang="fr">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Skills de developpeur</title>
        <link rel="stylesheet" href="style.css">
</head>

<body onload="load.resetCookie()" class="pg">


        <header>
                <h1>Une App de qualité supérieur</h1>
        </header>
        <main>
                <section>
                        <h2>Connexion</h2>
                        <form class="ajax" action="">
                                <input type="textarea" name="userName" id="" cols="20" required placeholder="Nom d'utilisateur">
                                <input type="password" name="password" required placeholder="Mot de passe">
                                <button>Se connecter</button>
                                <div class="confirmation"></div>
                                <input type="hidden" name="methodeApi" value="login">
                        </form>
                        <p id="reponse"></p>
                </section>
        </main>
        <footer>
                <p>Tous droits réservés.</p>
        </footer>
        <?php require_once 'api.php';?>
        <script src="app.js"></script>
        <script>
                connexion.start();
        </script>

</body>

</html>