<?php
/**
 * Created by PhpStorm.
 * User: Денис
 * Date: 05.02.2016
 * Time: 14:39
 */

class Session{

    protected static $flash_message;

    public static function setFlash($message){
        self::$flash_message = $message;
    }

    public static function hasFlash(){
        return !is_null(self::$flash_message);
    }

    public static function flash(){
        echo self::$flash_message;
        self::$flash_message = null;
    }

}