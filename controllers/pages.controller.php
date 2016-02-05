<?php

class PagesController extends Controller{

    public function __construct($data = array()){
        parent::__construct($data);
        $this->model = new Page();
    }

    public function index(){
        $this->data['pages'] = $this->model->getList();
    }

    public function view(){
        $params = App::getRouter()->getParams();

        if(isset($params[0])){
            $alies = strtolower($params[0]);

            $this->data['page'] = $this->model->getByAlies($alies);
        }
    }

}