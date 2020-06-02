<section>
    <h3>Connexion</h3>
    <form action="ajax">
            <input type="text" name="username" id="" required placeholder="Nom d'utilisateur">
            <input type="password" name="password" required placeholder="Mot de passe">
            <button>Se connecter</button>
            <div class="confirmation"></div>
            <input type="hidden" name="methodeApi" value="login">
    </form>
</section>


    
<?php

function login()
{
// LES INFOS DE FORMULAIRES SONT RECUPEREES DANS $_REQUEST
        $userForm      = $_REQUEST["username"] ?? "";
        $passwordForm   = $_REQUEST["password"] ?? "";

        $tabResult = Model::read("user", "email", $userForm);

        // DEV
        // NORMALEMENT DANS LE CREATE (INSCRIPTION D'UN NOUVEL UTILISATEUR...)
        $passwordHash = password_hash($passwordForm, PASSWORD_DEFAULT);

        foreach($tabResult as $tabLigne)
        {
                extract($tabLigne);
        // => CREE LES VARIABLES A PARTIR DES COLONNES
        // $id, $login, $email, $password, $level
        // ATTENTION: $password EST LE MOT DE PASSE HASHE
        }
        // => CREE UNE VARIABLE PAR COLONNE $id, $login, $password, $level
        // ATTENTION, ON A DEJA $password

        if (!empty($tabLigne))  // ON A TROUVE UNE LIGNE
        {
        // https://www.php.net/manual/fr/function.password-verify.php
        // ATTENTION: $passwordForm EST LE MOT DE PASSE EN CLAIR (DU FORMULAIRE)
        //              ET $password EST LE MOT DE PASSE HASHE (DE SQL)
        if (password_verify($passwordForm, $password))
        {
        // OK
        // AJOUTER ICI LE CODE QUI GERE LE LOGIN...
        ApiUser::$confirmation = "BIENVENUE $login!";

        // POUR COMPLETER
        // ON DOIT RENVOYER AU NAVIGATEUR UN BADGE D'ACCES
        // => TOKEN D'IDENTIFICATION
        // ET ENSUITE LE VISITEUR POURRA UTILISER CE BADGE DANS LA PARTIE ADMIN...
        // (LA PARTIE ADMIN POURRA VERIFIER SI LE BADGE EST VALIDE...)
        {
        // ON VA RENVOYER LA CLE API
        ApiUser::$cleApi = "TEXTE-SECRET-FOURNI-PAR-LE-LOGIN";
        }
        }
        else
        {
        // KO
        // AJOUTER ICI LE CODE QUI GERE LE LOGIN...
        ApiUser::$confirmation = "DESOLE, LE MOT DE PASSE EST INCORRECT ($passwordHash)";
        }
        }
        else
        {
        // KO email NON TROUVE
        ApiUser::$confirmation = "DESOLE, L'EMAIL EST INCORRECT ($passwordHash)";
        }

}
?>

<script>
    var mc ={};
    mc.start = function()
    {
            var listeSelection = document.querySelectorAll('form.ajax');
            listeSelection.forEach(function(balise)
            {
                    addEventListener('submit',mc.cbAjax);
            });
    }

    mc.cbAjax = function (event)
    {
            event.preventDefault();

            var formulaire = event.target;
            var formData = new FormData(formulaire);
            fetch('api.php',{
                    method: 'POST',
                    body: formData
            });
    }
    mc.start();

</script>