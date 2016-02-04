<?php

class Router{
    protected $uri;
    protected $controler;
    protected $action;
    protected $params;

    protected $route;
    protected $method_prefix;
    protected $language;

    /**
     * @return mixed
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controler;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    public function __construct($uri){
        $this->uri = urldecode(trim($uri, '/')); // декодим урлы для юзер вида

        // get defaults
        $routes = Config::get('routes');
        $this->route = Config::get('default_route');
        $this->method_prefix = isset($routes[$this->route]) ? $routes[$this->route] : '';
        $this->language = Config::get('default_language');
        $this->controler = Config::get('default_controller');
        $this->action = Config::get('default_action');

        $uri_parts = explode('?', $this->uri); // убираем гет-параметры

        $path = $uri_parts[0];
        $path_parts = explode('/', $path); // разбиваем адрес по слешам

        //echo "<pre>"; print_r($path_parts);

        if(count($path_parts)){ // проверяем на вхождение у роуты
            if(in_array(strtolower(current($path_parts)), array_keys($routes))){
                $this->route = strtolower(current($path_parts));
                $this->method_prefix = isset($routes[$this->route]) ? $routes[$this->route] : '';
                array_shift($path_parts);
            }elseif(in_array(strtolower(current($path_parts)), Config::get('languages'))){
                $this->language = strtolower(current($path_parts));
                array_shift($path_parts);
            }
            if(current($path_parts)){
                $this->controler = strtolower(current($path_parts));
                array_shift($path_parts);
            }
            if(current($path_parts)){
                $this->action = strtolower(current($path_parts));
                array_shift($path_parts);
            }

            $this->params = $path_parts;

        }
    }

    /**
     * @return mixed
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @return mixed
     */
    public function getMethodPrefix()
    {
        return $this->method_prefix;
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->language;
    }
}