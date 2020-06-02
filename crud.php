<section id="listeSkills">
        <table class="read">
            <thead>                    
                <tr>                    
                    <td>Nom</td>
                    <td>Prenom</td>
                    <td>Email</td>
                    <td>Raison du message</td>
                    <td>Message</td>
                    <td>Suppression</td>
                </tr>
            </thead>
            <tbody>                       

    <!-- Connection à la BDD pour lecture des skills : READ -->

    <?php

    $requeteSQL =
<<<CODESQL

    SELECT * FROM `OnePage`
    ORDER BY message DESC

CODESQL;

    $tabAssoColonneValeur = [];
    require "connectionDb.php";      // Je charge le code PHP pour envoyer la requete 

    $tabLigne = $pdoStatement->fetchAll(); // Je recupère mon tableau de resultat

    $sql = 'SELECT * FROM OnePage';
    $req = $pdo->query($sql);
    while($row = $req->fetch()) {
     extract($row);
        
        echo
<<<CODEHTML
        <tr>
            <td>$nom</td>
            <td>$prenom</td>
            <td>$email</td>
            <td>$raison</td>
            <td>$message</td>
            <td><button data-id="$id" class="delete">Supprimer</button></td>  
        </tr> 
CODEHTML;

    }    

    $req->closeCursor();

    ?>
            </tbody>
        </table>
    </section>

<!-- formulaire pour supprimer un message de la bdd -->

    <section class="cache">
        <form id="delete" action="" method="POST">
        <label for="id">identifiantMessage</label>
        <input type="text" name="id" required placeholder="entrez l'id du message à supprimer">
        <input type="hidden" name="identifiantFormulaire" value="delete">
        <button type="submit">Envoyez votre message</button>
        </form>
    </section>
                  

    <!-- Connection à la BDD pour lecture des messages reçus : READ -->

    <?php

    $requeteSQL =
<<<CODESQL

    SELECT * FROM `concerts`
    ORDER BY message DESC

CODESQL;

    $tabAssoColonneValeur = [];
    require "connectionDb.php";      // Je charge le code PHP pour envoyer la requete 

    $tabLigne = $pdoStatement->fetchAll(); // Je recupère mon tableau de resultat

    $sql = 'SELECT * FROM concerts';
    $req = $pdo->query($sql);
    while($row = $req->fetch()) {
     extract($row);
        
        echo
<<<CODEHTML
        <tr>
            <td>$lieu</td>
            <td>$date</td>
            <td>$ville</td>
            <td>$adresse</td>
            <td><button data-id="$id" class="delete">Supprimer</button></td>  
        </tr> 
CODEHTML;

    }    

    $req->closeCursor();

    ?>
            </tbody>
        </table>
    </section>

    <?php 
        //affectation de la valeur "delete" à la requête
        $identifiantFormulaire = $_REQUEST["identifiantFormulaire"] ?? "";
    
        require 'php/filtreformulaire.php'; 
    ?>


<!-- script JS permettant de supprimer un message en cliquant sur un bouton -->

<script>
    //quand je clique sur le bouton supprimer, on copie le code html du formulaire prérempli à la place du formulaire du delete (vide)
    var listeBoutonDelete = docume
        // popup de confirmation avant suppression du message
        var confirmation = window.confirm("Es-tu sûr de vouloir supprimer ce message ? Cette action est irréversible !");nt.querySelectorAll("button.delete");
    //Boucle en js sur chaque bouton
    listeBoutonDelete.forEach(function(bouton){
    //on va activer du code js sur le click
    bouton.addEventListener("click", function(event){
        //je recupère l'id de la ligne à supprimer, pour cela je recupère l'attribut data-id du bouton
        var idBouton = event.target.getAttribute("data-id");
        //je copie la valeur dans le champ du formulaire
        var champId = document.querySelector("form#delete input[name=id]");
        //et je change la valeur du champ du formulaire
        champId.value = idBouton;

        // popup de confirmation avant suppression du message
        var confirmation = window.confirm("Es-tu sûr de vouloir supprimer ce message ? Cette action est irréversible !");
        if (confirmation)
        {
            var formDelete = document.querySelector("form#delete");
            formDelete.submit();
        }
    });
    
});

</script>
