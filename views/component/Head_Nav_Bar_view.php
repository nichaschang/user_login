<header>
    <ul>
        <li class="flex-center">
            <a href="/">
                Home_Page
            </a>
        </li>
        <?
        if(isset($_SESSION[Common_Used::$MEMBER_INFO['USER_ID']]) AND !empty($_SESSION[Common_Used::$MEMBER_INFO['USER_ID']]))
        {?>
            <li class="flex-center">
                <form action="/controllers/Member_Login.php" method="post">
                    <input type="hidden" name="task" value="logout">
                    <input type="submit" value="Logout" class="btn-logout">
                </form>
            </li>
        <?}?>
    </ul>
</header>