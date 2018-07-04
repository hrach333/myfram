<?php
namespace myfram\core;


trait TSingletone
{
    protected static $instance;
    public static function instance(){
        if(self::$instance === null){
            self::$instance = new self();
        }
        return self::$instance;
    }
}