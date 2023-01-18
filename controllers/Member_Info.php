<?php
namespace controllers;

use Common_Used as Common_Used;
use Common_Used_By_Fn as Common_Used_By_Fn;
use \models\Member_Info as Member_Info_Model;

class Member_Info
{
    private $ID_KEY_NAME = 'USER_ID';
    private $member_info = array(
        'USER_ID' => 0,
        'USER_NAME' => '',
        'USER_LEVEL' => 0,
        'USER_VIP_EXPIRE_TIME' => '',
        'USER_EVENT_TAG' => array( 'SKILL' => array(), 'BUFF' => array()),
        'USER_STICKER' => ''
    );

    public function __construct(){}

    public function check_member_by_pk()
    {
        $id = $this->ID_KEY_NAME;

        if(!isset($_SESSION[$id]) AND empty($_SESSION[$id])) return false;

        return true;
    }

    // get info from db
    public function get_member_info($pk = '')
    {
        $id = $this->ID_KEY_NAME;

        $call_data = new Member_Info_Model();
        $this->member_info = $call_data->get_member_info($pk);

        $this->set_member_info_session();

        return $this->member_info;
    }

    //set session
    function set_member_info_session()
    {
        Common_Used_By_Fn::set_member_info_session($this->member_info);
    }

}
