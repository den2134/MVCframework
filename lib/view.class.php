<?php
/**
 * Created by PhpStorm.
 * User: Денис
 * Date: 04.02.2016
 * Time: 15:47
 */

class View{
    protected $data;
    protected $path;

    protected static function getDefaultViewPath(){
        $router = App::getRouter();
        if(!$router){
            return false;
        }
        $controller_dir = $router->getController();
        $template_name = $router->getMethodPrefix().$router->getAction().'.html';

        return VIEWS_PATH.DS.$controller_dir.DS.$template_name;
    }

    public function __construct($data = array(), $path = null){
        if(!$path){
            $path = self::getDefaultViewPath();
        }
        if(!file_exists($path)){
            throw new Exeption('Template file is not found in path: '.$path);
        }
        $this->path = $path;
        $this->data = $data;
    }

    public function render(){
        $data = $this->data;

        ob_start();
        include($this->path);
        $content = ob_get_clean();


    }
}