<?php
/**
 * Created by PhpStorm.
 * User: Денис
 * Date: 04.02.2016
 * Time: 18:51
 */

class ContactsController extends Controller{

    public function __construct($data = array())
    {
        parent::__construct($data);
        $this->model = new Message();
    }

    public function index(){
        if($_POST){
            if($this->model->save($_POST)){
                Session::setFlash('You message successfully sant!');
            }
        }
    }

}