<?php
namespace myfram\core;
use myfram\core\Registry;
use myfram\core\ErrorHandler;
class App
{
    public static $app;
    public function __construct()
    {
        session_start();
        self::$app  = Registry::instance();
        new ErrorHandler();
    }
}