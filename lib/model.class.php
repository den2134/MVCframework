<?php
/**
 * Created by PhpStorm.
 * User: Денис
 * Date: 05.02.2016
 * Time: 12:39
 */

class Model{
    protected $db;

    public function __construct(){
        $this->db = App::$db;
    }
}