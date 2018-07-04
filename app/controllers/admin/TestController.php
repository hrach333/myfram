<?php
/**
 * Created by PhpStorm.
 * User: Hrach
 * Date: 25.06.2018
 * Time: 5:07
 */

namespace app\controllers\admin;


use app\controllers\AppController;

class TestController extends AppController
{
    public $layout = 'admin';

    public function indexAction(){
        echo __METHOD__;
    }
    public function testAction(){
        echo __METHOD__;
    }
}