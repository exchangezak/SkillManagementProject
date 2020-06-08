<?php
require_once 'class/testApiVue.php';
require_once 'class/ApiUser.php';
$tabAssoJson = [];
$tabAssoJson["request"] = $_REQUEST;

// ON DONNE LA POSSIBILITE DE CHOISIR LA CLASSE Api ET LA METHODE A ACTIVER
$classeApi  = $_REQUEST["classeApi"] ?? "User";
$methodeApi = $_REQUEST["methodeApi"] ?? "";

// ON VA VERIFIER SI CETTE METHODE EXISTE DANS MON ApiUser
$codeApi = "Api$classeApi::$methodeApi";
if (is_callable($codeApi))
{
    // SI PHP A TROUVE LA METHODE
    // ALORS, ON PEUT L'ACTIVER...
    $codeApi();
}

// ON VA RECUPERER LA REPONSE DANS LA PROPRIETE
$curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
if( $curPageName == 'login.php' ){
$tabAssoJson["confirmation"] = ApiUser::$confirmation;
}
else{
$tabAssoJson["skills"] = ApiVue::$skills;
}


// CONVERTIR LE TABLEAU ASSOCIATIF EN TEXTE FORMATTE EN JSON
// https://www.php.net/manual/fr/function.json-encode.php
$texteJSON =    json_encode($tabAssoJson, JSON_PRETTY_PRINT);

echo $texteJSON;
