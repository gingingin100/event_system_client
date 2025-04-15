<?php

namespace App\Controllers;

final class EventController extends \Framework\Abstracts\Controller{
    public function index($id=null){
        $event = $this->event;
        if(isset($id)){
            $response = $event->sendHttpRequest('GET', 'http://'.TEST_SERVER.'/db','event',['id'=>$id]);
        }else{
            $response = $event->sendHttpRequest('GET', 'http://'.TEST_SERVER.'/db','event');
        }
        
        echo $response;
        
    }
    public function home($id=null){
        $render = $this->renderer;
        if(isset($_SESSION['api_key'])){
            $render->render('home');
        }else{
            $render->render("register",["id"=>$id]);
        }

    }
    public function update($id){
        $inputData = file_get_contents("php://input");

        $decodedData = json_decode($inputData, true);
        
        header('Content-Type: application/json');

        $event = $this->event;
        $response = $event->sendHttpRequest('PUT','http://'.TEST_SERVER.'/db','event',["received" => $decodedData,'id'=>$id]);
        echo $response;
    }

    public function delete($id){
        $inputData = file_get_contents("php://input");

        $decodedData = json_decode($inputData, true);
        
        header('Content-Type: application/json');

        $event = $this->event;
        $response = $event->sendHttpRequest('DELETE','http://'.TEST_SERVER.'/db','event',["received" => $decodedData,'id'=>$id]);
        echo $response;
    }

    public function submit($id=null){
        $inputData = file_get_contents("php://input");
        
        $decodedData = json_decode($inputData, true);
        
        header('Content-Type: application/json');

        $event = $this->event;
        $response = $event->sendHttpRequest('POST','http://'.TEST_SERVER.'/db','event',["received" => $decodedData]);
        echo $response;
    }
}