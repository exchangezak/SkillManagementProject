<?php
require_once "Model.php";

class ApiUser
{

    static $confirmation    ="";
    static $check           = 0;
    static function login()
    {
        
        $userForm      = $_REQUEST["userName"] ?? "";
        $passwordForm   = $_REQUEST["password"] ?? "";

        $tabResult = Model::read("user", "username", $userForm);

        $passwordHash = password_hash($passwordForm, PASSWORD_DEFAULT);

        foreach ($tabResult as $tabLigne) {
            extract($tabLigne);
            
        }

        if (!empty($tabLigne)) {
            if (password_verify($passwordForm, $pwd)) 
            {
                setcookie ("User", $username);
                
                ApiUser:: $check = 1;
                ApiUser::$confirmation = "C'est ok, entre $username";
            } 
            
            else 
            {
                ApiUser::$confirmation =  "Déso pas déso, mauvais mdp ($passwordHash) ! ";
            }
        } 
        
        else 
        {
            ApiUser::$confirmation = "Compte non trouvé ($passwordHash)";
        }
    }
}
