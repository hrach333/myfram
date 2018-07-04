<?php
namespace myfram\core\base;


abstract class Controller
{
    /**
     * Controller constructor.
     * @param $route
     */
    public $route = [];

    /*
     * данны для переменных
     * @var array
     */
    public $vars = [];

    public $view;

    /*
    * текуший шаблон
    * @var string
    */
    public $layout;

    public function __construct($route)
    {
        $this->route = $route;
        $this->view = $this->route['action'];
    }
    public function getView()
    {
        $vObj = new View($this->route,$this->layout,$this->view);
        $vObj->render($this->vars);
    }
    public function set($vars){
        $this->vars = $vars;
    }
    public function isAjax(){
        if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            // Если к нам идёт Ajax запрос, то ловим его
            return true;
        }
        return false;
    }
    public function loadView($view, $vars = []){
        extract($vars);
        require APP . "/views/{$this->route['controller']}/{$view}.php";
    }
}