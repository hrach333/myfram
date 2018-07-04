<?php

namespace myfram\core\base;

use myfram\core\Db;
use Valitron\Validator;

/**
 * Description of Model
 *
 */
abstract class Model {
    
    protected $pdo;
    protected $table;
    protected $pk = 'id';
    public $attributes = [];
    public $errors= [];
    public $rules = [];
    
    public function __construct() {
        $this->pdo = Db::instance();
    }

    public function load($data){
        foreach ($data as $name => $value){
            $this->attributes[$name] = $data[$name];
        }

    }

    public function validate($data){
        Validator::langDir(WWW .'/valitron/lang');
        Validator::lang('ru');
        $v = new Validator($data);
        $v->rules($this->rules);
        if($v->validate()){
            return true;
        }
        $this->errors = $v->errors();
        return false;
    }
    public function getErrors(){
        $errors = '<ul>';
        foreach ($this->errors as $error){
            foreach ($error as $item){
                $errors .= '<li>'.$item.'</li>';
            }
        }
        $errors .= '</ul>';
        $_SESSION['error'] = $errors;
    }
    public function save($table){
        $tbl = \R::dispense($table);
        foreach ($this->attributes as $name => $value) {
            $tbl->$name = $value;
        }
        return \R::store($tbl);
    }
    public function query($sql){
        return $this->pdo->execute($sql);
    }
    
    public function findAll(){
        $sql = "SELECT * FROM {$this->table}";
        return $this->pdo->query($sql);
    }
    
    public function findOne($id, $field = ''){
        $field = $field ?: $this->pk;
        $sql = "SELECT * FROM {$this->table} WHERE $field = ? LIMIT 1";
        return $this->pdo->query($sql, [$id]);
    }
    
    public function findBySql($sql, $params = []){
        return $this->pdo->query($sql, $params);
    }
    
    public function findLike($str, $field, $table = ''){
        $table = $table ?: $this->table;
        $sql = "SELECT * FROM $table WHERE $field LIKE ?";
        return $this->pdo->query($sql, ['%' . $str . '%']);
    }
    
}
