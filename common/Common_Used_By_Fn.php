<?php

use Common_Used as Common_Used;

class Common_Used_By_Fn
{

    // set session
    static function set_member_info_session($arr = array())
    {
        if(empty($arr)) return false;

        foreach($arr as $key=>$val)
        {
            $_SESSION[$key] = $val;
        }
    }

    // for password
    static function encrypt($salt = null, $encrypt_type = null, $password = null)
    {
        return openssl_encrypt($password, $encrypt_type, $salt);
    }

    //解密
    static function decrypt_by_form($token = null, $encrypt_type = null, $salt = null)
    {
        return openssl_decrypt($token, $encrypt_type, $salt);
    }

}