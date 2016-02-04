<?php

class PagesController extends Controller{

    public function index(){
        $this->data['test_content'] = 'Pages controller - index()';
    }

    public function view(){
        $params = App::getRouter()->getParams();

        if(isset($params[0])){
            $alies = strtolower($params[0]);

            $this->data['content'] = "Here will be a page with '{$alies}' alies";
        }
    }

}