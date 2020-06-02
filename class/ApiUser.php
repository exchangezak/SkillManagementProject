<?php

class ApiUser
{

    static $confirmation    ="";
    static $cleApi          ="";

    static function login()
    {
        $userForm      = $_REQUEST["username"] ?? "";
        $passwordForm   = $_REQUEST["password"] ?? "";

        $tabResult = Model::read("username", "pwd", $userForm);

        $passwordHash = password_hash($passwordForm, PASSWORD_DEFAULT);

        foreach ($tabResult as $tabLigne) {
            extract($tabLigne);
        }

        if (!empty($tabLigne)) {
            if (password_verify($passwordForm, $pwd)) 
            {
                ApiUser::$confirmation = " Bienvenue $login";

            } 
            
            else 
            {
                ApiUser::$confirmation =  "Déso pas déso, mauvais mdp ($passwordHash) ! ";
            }
        } 
        
        else 
        {
            ApiUser::$confirmation = "Email non trouvé ($passwordHash)";
        }
    }
}
