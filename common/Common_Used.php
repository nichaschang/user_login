<?php


class Common_Used
{

    //會員基本資料
     public static $MEMBER_INFO = array(
        'USER_ID'=> 'USER_ID' ,
        'USER_NAME' => 'DEFAULT_NAME',
        'USER_LEVEL'=> 'USER_LEVEL' ,
        'USER_VIP_EXPIRE_TIME'=> 'USER_VIP_EXPIRE_TIME' ,
        'USER_EVENT_TAG'=> 'USER_EVENT_TAG',
        'USER_STICKER' => 'USER_STICKER'
    );

     // 會員消費階層
    public static $LEVEL_STEP = array(
        0 => 1,
        900 => 2,
        1800 => 3,
        2700 => 4,
        3600 => 5,
    );

    // 會員折扣
    public static $FEEDBACK_PERCENT = array(
        1 => 0.03,
        2 => 0.04,
        3 => 0.05,
        4 => 0.06,
        5 => 0.07,
    );

    //會員等級
    public static $MEMBER_LEVEL = array(
        1 => '鐵牌等級',
        2 => '銅牌等級',
        3 => '銀牌等級',
        4 => '金牌等級',
        5 => '鑽石等級',
    );

    //加密使用
    public static $ENCRYPT_TYPE = 'DES-ECB';
    //登入使用加密
    public static $LOGIN_ENCRYPT_SALT = 'd3po38ddk1';

    public static $MEMBER_INFO_DATA = array(
        'psyduck' => array(
            'tSTFksa8m2w=' => array(
                'USER_ID' => 1,
                'USER_NAME' => 'psyduck',
                'USER_LEVEL' => 2,
                'USER_VIP_EXPIRE_TIME' => '2023-12-31',
                'USER_EVENT_TAG' => array( 'SKILL' => array('Earthquake', 'Stomp', 'Whirlpool'), 'BUFF' => array('frostbite')),
                'USER_STICKER' => 'https://i.pinimg.com/750x/4c/ed/b5/4cedb5c60599122f398eca06947e5af3.jpg'
            )
        ),
        'snorlax' => array(
            '/LXJ/cKzEco=' => array(
                'USER_ID' => 2,
                'USER_NAME' => 'snorlax',
                'USER_LEVEL' => 4,
                'USER_VIP_EXPIRE_TIME' => '2023-12-31',
                'USER_EVENT_TAG' => array( 'SKILL' => array('Thunder', 'Ice_Beam', 'Earthquake', 'Rock_Tomb'), 'BUFF' => array()),
                'USER_STICKER' => 'https://i.pinimg.com/564x/27/35/aa/2735aae20a223d0c33c22a8974d4eafd.jpg'
            )

        ),
        'marshtomp' => array(
            'yeqpwqkIJ08=' => array(
                'USER_ID' => 3,
                'USER_NAME' => 'marshtomp',
                'USER_LEVEL' => 1,
                'USER_VIP_EXPIRE_TIME' => '2022-12-31',
                'USER_EVENT_TAG' => array( 'SKILL' => array('Bite', 'Snore'), 'BUFF' => array('burn', 'sleep')),
                'USER_STICKER' =>'https://i.pinimg.com/564x/15/ce/39/15ce39a405db7d74ff35f464c8bfabb9.jpg'
            )
        ),
    );

    public static $SKILL_INFO_ARRAY = array(
        'Earthquake' => array( 'TYPE' => 'ground', 'POWER' => 100, 'ACCURACY' => 100),
        'Bite' => array( 'TYPE' => 'dark', 'POWER' => 60, 'ACCURACY' => 100),
        'Stomp' => array( 'TYPE' => 'normal', 'POWER' => 65, 'ACCURACY' => 100),
        'Ice_Beam' => array( 'TYPE' => 'ice', 'POWER' => 90, 'ACCURACY' => 100),
        'Whirlpool' => array( 'TYPE' => 'water', 'POWER' => 35, 'ACCURACY' => 85),
        'Snore' => array( 'TYPE' => 'normal', 'POWER' => 50, 'ACCURACY' => 100),
        'Rock_Tomb' => array( 'TYPE' => 'rock', 'POWER' => 60, 'ACCURACY' => 95),
        'Thunder' => array( 'TYPE' => 'electric', 'POWER' => 110, 'ACCURACY' => 70),
    );

    public static $BUFF_INFO_ARRAY = array(
        'burn' => '燃燒',
        'frostbite' => '凍傷' ,
        'sleep' => '睡覺'
    );
}

