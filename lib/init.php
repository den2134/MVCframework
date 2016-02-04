<?php

function mvcAutoload($class_name){
    $lib_path = ROOT.DS.'lib'.DS.strtolower($class_name).'.class.php';
    $controller_path = ROOT.DS.'controllers'.DS.str_replace('controller', '', strtolower($class_name)).'.controller.php';
    $model_path = ROOT.DS.'models'.DS.strtolower($class_name).'.php';

    if(file_exists($lib_path)){
        require_once($lib_path);
    }
    elseif(file_exists($controller_path)){
        require_once($controller_path);
    }
    elseif(file_exists($model_path)){
        require_once($model_path);
    }
    else{
        throw new Exception('Failed to include class: '.$class_name);
    }
}

spl_autoload_register('mvcAutoload');
require_once(ROOT.DS.'config'.DS.'config.php');