<?php
namespace models;
use Common_Used as Common_Used;

class Member_Level
{

    private $LEVEL_NUM_KEY_NAME = 'LEVEL';
    private $LEVEL_STRING_KEY_NAME = 'LEVEL_STRING';

    public $member_level = array();

    public function __construct(){}

    public function get_level($level = 1)
    {
        $level_num = $this->LEVEL_NUM_KEY_NAME;
        $level_str = $this->LEVEL_STRING_KEY_NAME;
        $this->member_level[$level_num] = $level;
        $this->member_level[$level_str] = '';

        $data_array = Common_Used::$MEMBER_LEVEL;

        if(isset($data_array[$level]))
        {
            $this->member_level[$level_num] = $level;
            $this->member_level[$level_str] = $data_array[$level];
        }

        return $this->member_level;
    }
}