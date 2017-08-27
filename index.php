<?php
session_start();
require 'vendor/autoload.php';
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

/*

$log = new Monolog\Logger("teste");
$log->pushHandler(new Monolog\Handler\StreamHandler('erros.log', Monolog\Logger::WARNING));
$log->addError("Aviso! Deu algo Errado");
*/
$core = new Core();
$core->run();
?>
