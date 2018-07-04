<?php
/**
 * Created by PhpStorm.
 * User: Hrach
 * Date: 29.06.2018
 * Time: 12:14
 */

namespace app\models;


use myfram\core\base\Model;

class User extends Model
{
    public $attributes = [
        'login' => '',
        'password' => '',
        'email' => '',
        'name' => '',
    ];
    public $rules = [
        'required'=>[
            ['login'],
            ['password'],
            ['email'],
            ['name'],
        ],
        'email'=>[
            ['email'],
        ],
        'lengthMin'=>[
            ['password',6]
        ]
    ];
    public function checkUnique(){
        $users = \R::findOne('users','login = ? OR email = ? LIMIT 1',[$this->attributes['login'],$this->attributes['email']]);
        if($users){
            if($users->login == $this->attributes['login']){
                $this->errors['unique'][] = 'Этот логин занят';
            }
            if($users->email == $this->attributes['email']){
                $this->errors['unique'][] = 'Этот емайл занят';
            }
            return false;
        }
        return true;
    }
    public function login(){

        $login = !empty($_POST['login']) ? trim($_POST['login']) : null;
        $password = !empty($_POST['password']) ? $_POST['password'] : null;
        if($login && $password){
            $user = \R::findOne('users','login = ? LIMIT 1',[$login]);
            if($user){
                if(password_verify($password,$user->password)){
                    foreach ($user as $k => $v){
                      if($k !='password')  $_SESSION['user'][$k] = $v;
                    }
                    return true;
                }
            }
        }
    }
}