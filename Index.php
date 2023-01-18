<?php
include_once dirname(__FILE__)."/Autoload.php";

use Common_Used as Common_Used;
use Common_Used_By_Fn as Common_Used_By_Fn;

use \controllers\Member_Login as Member_Login;

class Index
{
    public function __construct()
    {
        $this->index();
    }

    function index()
    {
        if(empty($_SESSION['USER_ID']))
        {
            include_once dirname(__FILE__)."/views/Index_view.php";
            exit();
        }

        $member_login = new Member_Login();

        header("Location:/controllers/Member_Login.php");
        exit();
    }
}

new Index();