<?php
namespace controllers;
use Common_Used;
use Common_Used_By_Fn;
use \models\Member_Event as Member_Event_Model;
use \controllers\Skill as Skill_Con;
use \controllers\Buff as Buff_Con;

class Member_Event
{
    public $event_tag = array();
    private $EVENT_KEY_NAME = 'USER_EVENT_TAG';

    function __construct(){}

    function set_member_event($type_arr = null)
    {
        foreach($type_arr as $type => $val)
        {
            if(method_exists(self::class, $type)) $this->event_tag[$type] = $this->$type($val);
        }

        $this->set_member_info_session($this->event_tag);

        return $this->event_tag;
    }

    private function SKILL($skill = array(), $act = 'get')
    {
        $key_name = __FUNCTION__;
        $skill_con = new Skill_Con();
        $act = strtolower($act);

        if(method_exists($skill_con, $act)) $this->event_tag[$key_name] = $skill_con->$act($skill);

        return $this->event_tag[$key_name];
    }

    private function BUFF($buff = array(), $act = 'get')
    {
        $key_name = __FUNCTION__;
        $buff_con = new Buff_Con();
        $act = strtolower($act);

        if(method_exists($buff_con, $act)) $this->event_tag[$key_name] = $buff_con->$act($buff);

        return $this->event_tag[$key_name];
    }

    //set session
    function set_member_info_session($type = null)
    {
        $event_key_name = $this->EVENT_KEY_NAME;

        if(empty($type)) return false;

        $event_tag[$event_key_name] = $this->event_tag;

        Common_Used_By_Fn::set_member_info_session($event_tag);
    }
}


