<?php
namespace myfram\core;
class Router {
    protected static $routes;
    protected static $route;

    public static function add($regexp, $route = []){
        self::$routes[$regexp] = $route;
    }

    public static function getRoutes(){
        return self::$routes;
    }
    public static function getRoute(){
        return self::$route;
    }
    public static function matchRoute($url){
        foreach(self::$routes as $pattern => $route){
            if(preg_match("#$pattern#i", $url, $matches)){
                foreach($matches as $k => $v){
                    if(is_string($k)){
                        $route[$k] = $v;
                    }
                }
                if(!isset($route['action'])){
                    $route['action'] = 'index';
                }
                // prefix for admin controllers
                if(!isset($route['prefix'])){
                    $route['prefix'] = '';
                }else{
                    $route['prefix'] .= '\\';
                }
                $route['controller'] = self::upperCamelCase($route['controller']);
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    /*
     * Перенаправляет $url
     * @dispatch type $url
     */
    public static function dispatch($url){
        $url = self::removeQueryString($url);
        if(self::matchRoute($url)){
            $controller = 'app\controllers\\' . self::$route['prefix'] . self::$route['controller'] . 'Controller';
            if(class_exists($controller)){
                $obj = new $controller(self::$route);
                $action = self::lowerCamelCase(self::$route['action']).'Action';
                if(method_exists($obj,$action)){
                    $obj->$action();
                    $obj->getView();
                }else{
                   // echo "Метод $controller::$action не найден.";
                    throw new \Exception("Метод $controller::$action не найден.",404);
                }
            }else{
               // echo "Контролер ".$controller." не найден.";
                throw new \Exception("Контролер ".$controller." не найден.",404);
            }
        }else{
            //http_response_code(404);
            //require '404.html';
            throw new \Exception("Страница не найдена",404);
        }
    }
    protected static function upperCamelCase($name){
        return $name = str_replace(' ','',ucwords(str_replace('-',' ',$name)));
    }
    protected static function lowerCamelCase($name){
        return $name = lcfirst(self::upperCamelCase($name));
    }
    protected static function removeQueryString($url){
        if($url){
            $params = explode('&',$url,2);
            if(false === strpos($params[0],'=')){
                return rtrim($params[0],'/');
            }else{
                return '';
            }
        }
    }
}