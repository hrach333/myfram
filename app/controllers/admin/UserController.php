<?php
/**
 * Created by PhpStorm.
 * User: Hrach
 * Date: 25.06.2018
 * Time: 5:01
 */

namespace app\controllers\admin;

use myfram\core\base\View;

class UserController extends AppController
{
    public function indexAction(){
        View::setMeta('Админка - гланая страница','Описание страницы','админка, главная');
    }
    public function testAction(){

    }
}