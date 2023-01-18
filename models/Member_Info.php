<?php
namespace models;

use Common_Used as Common_Used;

class Member_Info
{
    public $member_info = array();
    private $ID_KEY_NAME = 'USER_ID';

    public function __construct(){}

    function get_member_info($pk = '')
    {
        if(empty($pk)) return $this->member_info;

        $id = $this->ID_KEY_NAME;

        $data_array = Common_Used::$MEMBER_INFO_DATA;

        foreach($data_array as $key)
        {
            foreach($key as $val_key => $val_val)
            {
                if($val_val[$id] == $pk) $this->member_info = $val_val;
            }
        }
        return $this->member_info;
    }

}
