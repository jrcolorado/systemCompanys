<?php
session_start();
require 'config.php';

error_reporting(E_ALL);
ini_set('display_errors', 'On');

define('BASE_URL','http://localhost/PhpCompany');
spl_autoload_register(function ($class) {
    if (strpos($class, 'Controller') > -1) {
        if (file_exists('controllers/' . $class . '.php')) {
            require_once 'controllers/' . $class . '.php';
        }
    } else if (file_exists('models/' . $class . '.php')) {
        require_once 'models/' . $class . '.php';
    } else {
        require_once 'core/' . $class . '.php';
    }
});
$core = new Core();
$core->run();
?>
