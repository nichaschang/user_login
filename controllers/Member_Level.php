<?php
namespace controllers;

use Common_Used as Common_Used;
use Common_Used_By_Fn as Common_Used_By_Fn;
use \models\Member_Level as Member_Level_Model;

class Member_Level
{

     private $member_level = array(
         'USER_LEVEL' => array(
             'LEVEL'        => 1,
             'LEVEL_STRING' => '鐵牌等級'
         )
     );
     private $LEVEL_KEY_NAME = 'USER_LEVEL';
     private $LEVEL_NUM_KEY_NAME = 'LEVEL';
     private $LEVEL_STRING_KEY_NAME = 'LEVEL_STRING';

     public function __construct(){}

     function level_get($level = 1)
    {
        $level_key_name = $this->LEVEL_KEY_NAME;

        $call_data = new Member_Level_Model();

        $this->member_level[$level_key_name] = $call_data->get_level($level);
//
        $this->update_level();
        $this->set_member_info_session();

        return $this->member_level;
    }

    function level_up()
    {
        $level_num = $this->LEVEL_NUM_KEY_NAME;

        $this->member_level[$level_num] += 1;
        $this->update_level();

        return $this->member_level;
    }

    function level_down()
    {
        $level_num = $this->LEVEL_NUM_KEY_NAME;

        $this->member_level[$level_num] -= 1;
        $this->update_level();

        return $this->member_level;
    }

    function update_level()
    {
        $level_key = $this->LEVEL_KEY_NAME;
        $level_num = $this->LEVEL_NUM_KEY_NAME;
        $sess_level = $_SESSION[$level_key];

        if($sess_level != $this->member_level[$level_num]) $_SESSION[$level_key] = $this->member_level[$level_num];
    }

     //set session
     function set_member_info_session()
     {
         Common_Used_By_Fn::set_member_info_session($this->member_level);
     }

}

new Member_Level();
