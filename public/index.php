<?php
use \myfram\core\Router;
use \myfram\core\App;
define('DEBUG',1);
define('WWW',__DIR__);
define('CORE', dirname(__DIR__) . '/vendor/myfram/core');
define('ROOT',dirname(__DIR__));
define('LIBS',dirname(__DIR__).'/vendor/myfram/libs');
define('APP',dirname(__DIR__).'/app');
define('CACHE',dirname(__DIR__).'/tmp/cache');
define('LAYOUT','default');
$query = $_SERVER['QUERY_STRING'];
/*
spl_autoload_register(function($class){
    //debug($class);
    $file = ROOT .'/'.str_replace('\\','/',$class).'.php';
    if(is_file($file)){
        require_once $file;
    }
});
*/

require '../vendor/myfram/libs/functions.php';
require __DIR__.'/../vendor/autoload.php';
//require '../vendor/core/Router.php';

new App();
Router::add('^pages/?(?P<action>[a-z-]+)?$',['controller'=>'Posts']);
Router::add('^admin$',['controller'=>'User','action'=>'index','prefix'=>'admin']);
Router::add('^admin/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$',['prefix'=>'admin']);
//default routs
Router::add('^$',['controller'=>'Main','action'=>'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');
//debug(Router::getRoutes());
Router::dispatch($query);