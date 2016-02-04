<?php
/**
 * Created by PhpStorm.
 * User: Денис
 * Date: 04.02.2016
 * Time: 19:22
 */

class DB{
    protected $connection;

    public function __construct($host, $user, $password, $db_name){
        $this->connection = new mysqli($host, $user, $password, $db_name);

        if(mysqli_connect_error()){
            throw new Exception('Could not connect to DataBase!');
        }
    }

    public function query($sql){
        if(!$this->connection){
            return false;
        } else {
            $result = $this->connection->query($sql);
        }

        if(mysqli_error($this->connection)){
            throw new Exception(mysqli_error($this->connection));
        }

        if(is_bool($result)){
            return $result;
        }

        $data = array();
        while($row = mysqli_fetch_assoc($result)){
            $data[] = $row;
        }
        return $data;
    }

    public function escape($str){
        return mysqli_escape_string($this->connection, $str);
    }
}