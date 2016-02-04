<?php
/**
 * Created by PhpStorm.
 * User: Денис
 * Date: 04.02.2016
 * Time: 17:53
 */

class Lang{
    protected static $data;

    public static function load($lang_code){
        $lang_file_path = ROOT.DS.'lang'.DS.strtolower($lang_code).'.php';

        if(file_exists($lang_file_path)){
            self::$data = include($lang_file_path);
        } else {
            throw new Exception('Lang file not found: '.$lang_file_path);
        }
    }

    public static function get($key, $default_value = ''){
        return isset(self::$data[strtolower($key)]) ? self::$data[strtolower($key)] : $default_value;
    }
}