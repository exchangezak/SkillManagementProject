<?php

require 'function.php';

// CREATE : ajout de compétence

if ($identifiantFormulaire == "create")
{
    //création d'un tableau associatif (clés et variables)
    $tabAssoColonneValeur = [
        "username"            => maj(filtrer("username")),
        "skill"         => maj(filtrer("skill")),
        "level"          => filtrer("level"),
    ];

    //Raccourci permentant de créer des variables à partir des clés du tableau associatif
    extract($tabAssoColonneValeur);

    //on vérifie que les varibles existes et ne sont pas vides
    if ($username        != "" 
        && $skill  != ""
        && $level   != "")
    { 
        //Preparation de la requête SQL
        $requeteSQL   =
<<<CODESQL

INSERT INTO skills
( username, skill, level)
VALUES
( :username, :skill, :level) 

CODESQL;

        //Feedback utilisateur 
        echo '<p style="color:black;">Votre compétence a bien été ajouté. Merci.</p>';
    }
    
    else {
        echo '<p style="color:black;">Veuillez remplir tous les champs obligatoire s\'il vous plait !</p>';
    }
}

//DELETE: suppression de compétence

if ($identifiantFormulaire == "delete") 
{
    if (count($_REQUEST) > 0) {
        $tabAssoColonneValeur = [
            "id" => $_REQUEST["id"],
        ];
        //Preparation requête SQL
        $requeteSQL   =
<<<CODESQL

DELETE FROM skill WHERE id = :id

CODESQL;

    //Feedback administrateur
    echo "La compétence a bien été supprimé";
    }
}


//UPDATE D'UNE COMPETENCE


//Envoie d'instruction à la bdd 
require "connectionDb.php";