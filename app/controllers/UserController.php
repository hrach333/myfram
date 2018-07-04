<?php

namespace app\controllers;
use app\models\User;

class UserController extends AppController
{
    public function signupAction(){
        if(!empty($_POST)){
            $user = new User();
            $data = $_POST;
            //var_dump($data);
            $user->load($data);
            if(!$user->validate($data) || !$user->checkUnique()){
                $user->getErrors();
                $_SESSION['form_data'] = $data;
                redirect();
            }
            $user->attributes['password'] = password_hash($user->attributes['password'],PASSWORD_DEFAULT);
            if($user->save('users')){
                $_SESSION['success'] = 'Вы успешно зарегистрированы!';
            }else{
                $_SESSION['error'] = 'Ошибка! Попробуйте пойже';
            }
            redirect();
        }

    }
    public function loginAction(){
        if(!empty($_POST)){
            $user = new User();
            if($user->login()){
                $_SESSION['success'] = 'Вы успешно вошли!';
            }else{
                $_SESSION['error'] = 'Логин/пароль введены не верно!';
            }
            redirect('/');
        }
    }
    public function logoutAction(){
        if(isset($_SESSION['user'])) $_SESSION['user'] = null;
        redirect('/user/login');
    }


}