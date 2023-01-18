<!doctype html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport'
          content='width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>Success</title>
    <link rel='stylesheet' href='../css/common.css?v=14'>
</head>
<body>
<? include dirname(__FILE__).'/component/Head_Nav_Bar_view.php';?>
    <div class='mx-auto mt-2'>
        <div class='flex-center flex-column'>
            <div class='card flex-center'>
                <img src='<?= $this->sess_member_info['USER_STICKER'] ?>' class='card__img'>
                <div class='card__content flex-center'>
                    <h3 class='card__name'>
                        <?= $this->sess_member_info['USER_NAME'] ; ?>
                    </h3>
                    <h4 class='card__position'>
                        <input type='hidden' value='<?= $this->sess_member_info['USER_LEVEL']['NUM'] ?>'>
                        狀態：<?
                        if(empty($this->sess_member_info['USER_EVENT_TAG']['BUFF']))
                        {?>
                          無
                        <?}
                        else{
                            foreach($this->sess_member_info['USER_EVENT_TAG']['BUFF'] as $key => $val)
                            {?>
                                <?= $val?>
                            <?}?>
                        <?}?>
                    </h4>
                </div>
            </div>
            <div class='member-info'>
                <ul style="display: grid;  grid-template-columns: 1fr 1fr;width: 360px">
                <?
                foreach($this->sess_member_info['USER_EVENT_TAG']['SKILL'] as $type => $val)
                {?>
                    <li style="padding: 15px; border: 1px solid #999; margin: 6px">
                        <?= $type?>
                    </li>
                    <input type="hidden" name="skill-type" value="<?=$val['TYPE']?>?>">
                    <input type="hidden" name="skill-power" value="<?=$val['POWER']?>?>">
                    <input type="hidden" name="skill-accuracy" value="<?=$val['ACCURACY']?>?>">
                <?}?>
                <?
                if(count($this->sess_member_info['USER_EVENT_TAG']['SKILL']) < 4)
                {?>
                    <?
                    for($i = count($this->sess_member_info['USER_EVENT_TAG']['SKILL']); $i < 4; $i++)
                    {?>
                        <li style="padding: 15px; border: 1px solid #999; margin: 6px"> - </li>
                    <?}?>
                <?}?>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>