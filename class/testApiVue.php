<?php
require_once "Model.php";

class ApiVue
{
    static $skills=[];
    static function getSkills()
    {
        $tabResult = Model::read("skills", "username", "skill", "level");

        foreach ($tabResult as $tabLigne) {
            extract($tabLigne);
            array_push($skills, $tabLigne);
        }
    }
}