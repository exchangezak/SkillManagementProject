<?php
require_once "Model.php";

class ApiVue
{
    static function getSkills()
    {
        $tabResult = Model::read("skills", "username", "skill", "level");

        foreach ($tabResult as $tabLigne) {
            extract($tabLigne);
        }
    }
}