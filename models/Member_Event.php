<?php
namespace models;

use Common_Used as Common_Used;

class Member_Event
{

    public $event_tag = array();

    public function __construct(){}

    public function get_skill_info($skill_arr)
    {

        $data_array = Common_Used::$SKILL_INFO_ARRAY;

        if(!empty($skill_arr))
        {
            foreach($skill_arr  as $type)
            {
                if(isset($data_array[$type])) $this->event_tag[$type] = $data_array[$type];
            }
        }

        return $this->event_tag;
    }

    public function get_buff_info($buff_arr)
    {
        $data_array = Common_Used::$BUFF_INFO_ARRAY;

        if(!empty($buff_arr))
        {
            foreach($buff_arr as $type)
            {
                if(isset($data_array[$type])) $this->event_tag[$type] = $data_array[$type];
            }
        }

        return $this->event_tag;
    }


}

