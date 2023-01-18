<?php

namespace controllers;

use \models\Member_Event as Member_Event_Model;

class Buff
{
    public $buff_info_array = array();

    public function __construct(){}

    public function get($buff_arr = array())
    {
        $buff = new Member_Event_Model();
        $this->buff_info_array = $buff->get_buff_info($buff_arr);

        return $this->buff_info_array;
    }

    public function update(){}

    public function delete(){}

}
