<?php

namespace controllers;

use \models\Member_Event as Member_Event_Model;

class Skill
{
    public $skill_info_array = array();

    public function __construct(){}

    public function get($skill_arr = array())
    {
        $skill = new Member_Event_Model();
        $this->skill_info_array = $skill->get_skill_info($skill_arr);

        return $this->skill_info_array;
    }

    public function update(){}

    public function delete(){}

}
