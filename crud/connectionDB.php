<?php

$pdo = new PDO("mysql:host=remotemysql.com; dbname=rkWpTuWAEM; charset=utf8;", "rkWpTuWAEM", "XvWhaSlsc5");

//on envoie la requete préparée, pdoStatement est un container qui englobe les résultats de la requête SQL 
$pdoStatement = $pdo->prepare($requeteSQL);

//on fournit les données extérieurs à part 
$pdoStatement->execute($tabAssoColonneValeur);


