<?php
session_start();

set_include_path(
    dirname(__FILE__) . '/' . PATH_SEPARATOR.
                dirname(__FILE__). '/controllers/' . PATH_SEPARATOR.
                dirname(__FILE__) . '/common/'
);
spl_autoload_extensions('.php');
spl_autoload_register();


