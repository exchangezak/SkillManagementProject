<section id="listeSkills">
        <table class="read">
            <thead>                    
                <tr>                    
                    <td>Nom</td>
                    <td>Compétence</td>
                    <td>Niveau</td>
                </tr>
            </thead>
            <tbody>                       

    <!--READ : Connection à la BDD pour lecture des skills -->

    <?php

    $requeteSQL =
<<<CODESQL

    SELECT * FROM `skills`
    ORDER BY message DESC

CODESQL;

    $tabAssoColonneValeur = [];
    require "connectionDb.php";      // Je charge le code PHP pour envoyer la requete 

    $tabLigne = $pdoStatement->fetchAll(); // Je recupère mon tableau de resultat

    $sql = 'SELECT * FROM skills';
    $req = $pdo->query($sql);
    while($row = $req->fetch()) {
     extract($row);
        
        echo
<<<CODEHTML
        <tr>
            <td>$username</td>
            <td>$skill</td>
            <td>$level</td>
            <td><button data-id="$id" class="delete">Supprimer</button></td>  
        </tr> 
CODEHTML;

    }    

    $req->closeCursor();

    ?>
            </tbody>
        </table>
    </section>

<!-- formulaire pour supprimer un utilisateur de la bdd -->

    <section class="cache">
        <form id="delete" action="" method="POST">
        <label for="id">identifiantMessage</label>
        <input type="text" name="id" required placeholder="entrez l'id de l'utilisateur à supprimer">
        <input type="hidden" name="identifiantFormulaire" value="delete">
        <button type="submit">supprimer</button>
        </form>
    </section>
                  


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
