<?php

class Model
{
    static function read ($nomTable, $nomColonne, $valeurColonne)
    {
        $requeteSQL =
<<<CODESQL
SELECT * FROM $nomTable
WHERE $nomColonne = :nomColonne;
CODESQL;

        
        $pdo =new PDO("mysql:host=remotemysql.com;dbname=rkWpTuWAEM;charset=utf8","rkWpTuWAEM","XvWhaSlsc5");
        $pdostatement = $pdo->prepare($requeteSQL);
        $pdostatement->execute(["nomColonne"=> $valeurColonne]);

        $tabResult = $pdostatement->fetchAll(PDO::FETCH_ASSOC);
        return $tabResult;
    }

    static function envoyerRequeteSQL($requeteSQL,$tabAssoColonneValeur)
    {
        $pdo =new PDO("mysql:host=remotemysql.com;dbname=rkWpTuWAEM;charset=utf8","rkWpTuWAEM","XvWhaSlsc5");
        $pdostatement = $pdo->prepare($requeteSQL);
        $pdostatement->execute($tabAssoColonneValeur);
        return $pdostatement;
    }
}
