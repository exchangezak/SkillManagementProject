<!DOCTYPE html>
<html lang="fr">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Skills de developpeur</title>
        <link rel="stylesheet" href="style.css">
</head>
<body onload="deleteCookie()" class="pg">
        

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
    <p id="reponse"></p>
</section>

<footer>
        <p>Tous droits réservés.</p>
</footer>
<?php>require_once 'api.php';<?>
<script>
        var reponse = document.querySelector('#reponse');

        var connexion ={};
        var cookie = document.cookie;

     function deleteCookie() {
                        var user = getCookie("User");
                        if (user != "") {
                                user = "";
                        }
                };

    function getCookie(cname) {
                var name = cname + "=";
                var ca = document.cookie.split(';');

                for(var i = 0; i < ca.length; i++) {
                        var c = ca[i];
                        while (c.charAt(0) == ' ') {
                        c = c.substring(1);
                        }
                        if (c.indexOf(name) == 0) {
                        return c.substring(name.length, c.length);
                        }
                }
                return "";
                };

                function checkCookie() {
                        var user = getCookie("User");
                        if (user != "") {
                                window.location.replace('index.php');
                        }
                        else{
                                reponse.innerText ='accès refusé' ;
                        }
                };

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
            })
            
            .then(checkCookie)


            
    }

    connexion.start();
    
</script>

</body>