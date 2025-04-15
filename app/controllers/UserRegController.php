<?php

namespace App\Controllers;

final class UserRegController extends \Framework\Abstracts\Controller{
    public function index($id=null){
        $event=$this->event;
        $response = $event->sendHttpRequest('GET','http://'.TEST_SERVER.'/db','reg',["received" => [
            "id"=>$id
        ]]);
        echo $response;
        $render = $this->renderer;
        $render->render("test",["id"=>$id]);
    }
    public function submit($id=null){
        $event=$this->event;
        $response = $event->sendHttpRequest('POST','http://'.TEST_SERVER.'/db','reg',["received" => [
            "id"=>$id,
            "api_key"=>$_SESSION['api_key']
        ]]);
        echo $response;
    }

    public function delete($id){
        
    }
    public function update($id){

    }
}