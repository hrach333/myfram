<?php

namespace app\controllers;

use app\models\Main;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use myfram\core\base\View;
use PHPMailer\PHPMailer\PHPMailer;

class MainController extends AppController
{
    public function indexAction(){
        // create a log channel
        $log = new Logger('name');
        $log->pushHandler(new StreamHandler(ROOT.'/tmp/your.log', Logger::WARNING));

// add records to the log
        $log->warning('Foo');
        $log->error('Bar');
        //$this->layout = false;
        //App::$app->getList();

        $model = new Main();
        $mailer= new PHPMailer();

        $posts = \R::findAll('posts');
        View::setMeta('Главная страница','Описание страницы','ключевые слова');
        $title= 'Посты';
        $this->set(compact('title','posts'));
    }

    public function testAction(){
        if($this->isAjax()){
            $model = new Main();
            $posts = $model->findOne($_POST['id']);
            $posts = $posts[0];
            $this->loadView('_test',compact('posts'));
            die;
        }

    }
    public function testPage(){
        echo 'Man::testPage';
    }
}