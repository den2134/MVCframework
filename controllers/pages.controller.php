<?php

class PagesController extends Controller{

    public function index(){
        echo 'Pages controller - index()';
    }

    public function view(){
        $params = App::getRouter()->getParams();

        if(isset($params[0])){
            $alies = strtolower($params[0]);

            echo "Here will be a page with '{$alies}' alies";
        }
    }

}