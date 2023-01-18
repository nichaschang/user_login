<?php
namespace controllers;

include_once dirname(dirname(__FILE__)).'/Autoload.php';

use \controllers\Member_Info as Member_Info;
use \controllers\Member_Event as Member_event;
use \controllers\Member_Level as Member_Level;
use Common_Used as Common_Used;
use Common_Used_By_Fn as Common_Used_By_Fn;

class Member_Login
{

    protected $SALT = 'd3po38ddk1';
    protected $sess_member_info = array(
        'USER_ID'    => 0,
        'USER_NAME'  => '',
        'USER_LEVEL' => array(
            'NUM'    => 0,
            'STRING' => ''
        ),
        'USER_VIP_EXPIRE_TIME'=> '',
        'USER_STICKER' =>'',
        'USER_EVENT_TAG' => array()
    );

    public function __construct()
    {
        if(!isset($_REQUEST['task']) OR empty($_REQUEST['task'])) $_REQUEST['task'] = null;
        $this->main($_REQUEST['task']);
    }

    function main($mission = '')
    {
        switch($mission)
        {
            case 'login':
                $this->login();
                break;
            case 'logout':
                $this->logout();
                break;
            default:
                $this->login(false);
                break;
        }
    }

    // user login or check login status
    function login($from_login_page = true)
    {
        $account = isset($_REQUEST['account']) ? $_REQUEST['account'] : null;
        $password = isset($_REQUEST['password']) ? $_REQUEST['password'] : null;

        $encryprt_password = Common_Used_By_Fn::encrypt(Common_Used::$LOGIN_ENCRYPT_SALT, Common_Used::$ENCRYPT_TYPE, $password);

        $member_info = new Member_Info();

        if(!$this->check_login(strtolower($account), $encryprt_password))
        {
            include_once dirname(dirname(__FILE__)).'/views/Login_Fail_view.php';
            exit();
        }

        //if check_login is true, it means is not from login page
        if(!$from_login_page)
        {
            $check_login_status = true;

            if(!isset($this->sess_member_info['USER_ID']) AND empty($this->sess_member_info['USER_ID'])) $check_login_status = false;

            if(!isset($_SESSION['USER_ID']) AND empty($_SESSION['USER_ID'])) $check_login_status = false;

            if(!$member_info->check_member_by_pk($this->sess_member_info['USER_ID'])) $check_login_status = false;

            if(!$check_login_status)
            {
                include_once dirname(dirname(__FILE__)).'/views/Login_Fail_view.php';
                exit();
            }
        }

        $is_member_info = $member_info->get_member_info($this->sess_member_info['USER_ID']);

        if(empty($is_member_info))
        {
            include_once dirname(dirname(__FILE__)).'/views/Login_Fail_view.php';
            exit();
        }

        // set member info array
        $this->sess_member_info['USER_ID']              = isset($is_member_info['USER_ID']) ? $is_member_info['USER_ID'] : null;
        $this->sess_member_info['USER_NAME']            = isset($is_member_info['USER_NAME']) ? $is_member_info['USER_NAME'] : null;
        $this->sess_member_info['USER_VIP_EXPIRE_TIME'] = isset($is_member_info['USER_VIP_EXPIRE_TIME']) ? $is_member_info['USER_VIP_EXPIRE_TIME'] : null;
        $this->sess_member_info['USER_STICKER']         = isset($is_member_info['USER_STICKER']) ? $is_member_info['USER_STICKER'] : null;

        $member_level = new Member_Level();
        $is_member_level_array = $member_level->level_get($is_member_info['USER_LEVEL']);

        $this->sess_member_info['USER_LEVEL']['NUM']    = isset($is_member_level_array['USER_LEVEL']['LEVEL']) ? $is_member_level_array['USER_LEVEL']['LEVEL'] : null;
        $this->sess_member_info['USER_LEVEL']['STRING'] = isset($is_member_level_array['USER_LEVEL']['LEVEL_STRING']) ? $is_member_level_array['USER_LEVEL']['LEVEL_STRING'] : null;

        $event = array();

        foreach($is_member_info['USER_EVENT_TAG'] as $key => $val)
        {
            $event[$key] = $val;
        }

        $member_event = new Member_Event();
        $event_arr = $member_event->set_member_event($event);

        $this->sess_member_info['USER_EVENT_TAG'] = $event_arr;

        include_once dirname(dirname(__FILE__)).'/views/Login_Success_view.php';
    }

    // clean session and logout
    function logout()
    {
        session_unset();
        header('Location:/');
        exit();
    }

    public function check_login( $account = '', $password = '' )
    {
        if(!empty($account) AND !empty($password))
        {
            if(!isset(Common_Used::$MEMBER_INFO_DATA[$account][$password])) return false;
            $this->sess_member_info['USER_ID'] = Common_Used::$MEMBER_INFO_DATA[$account][$password]['USER_ID'];

        }else
        {
            if(empty($_SESSION['USER_ID'])) return false;
            $this->sess_member_info['USER_ID'] = $_SESSION['USER_ID'];
        }
        return true;
    }

}

new Member_Login();
