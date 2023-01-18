<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/common.css?v=1">
</head>
<body>
<? include dirname(__FILE__).'/component/Head_Nav_Bar_view.php';?>
    <div class="container flex-center">
        <form action="/controllers/Member_Login.php" method="post">
            <input type="hidden" name="user_toeken" value="<?=$token?>">
            <div class="flex-center flex-column">
                <input type="hidden" value="login" name="task">
                <div style="margin: 10px">
                    <span>Account</span>
                    <br>
                    <input type="text" name="account" value=""/>
                </div>
                <div style="margin: 10px">
                    <span>Password</span>
                    <br>
                    <input type="text" name="password" value=""/>
                </div>
                <input type="submit" value="Login" class="btn" style="margin-top: 25px">
            </div>
        </form>
    </div>
</body>
</html>