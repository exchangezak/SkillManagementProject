<section>
    <h3>Connexion</h3>
    <form class="ajax" action="">
            <input type="text" name="username" id="" required placeholder="Nom d'utilisateur">
            <input type="password" name="password" required placeholder="Mot de passe">
            <button>Se connecter</button>
            <div class="confirmation"></div>
            <input type="hidden" name="methodeApi" value="login">
    </form>
</section>

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