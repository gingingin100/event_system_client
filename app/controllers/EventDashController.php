<?php

namespace App\Controllers;

final class EventDashController extends \Framework\Abstracts\Controller{
    public function index(){
        $render = $this->renderer;
        $event = $this->event;
        $response1 = $event->sendHttpRequest('GET','http://'.TEST_SERVER.'/user?email='.$_SESSION['email'],'auth'); 
        echo $response1;
        // $response = $event->sendHttpRequest('GET', 'http://'.TEST_SERVER.'/users/'..'events','reg');
    }

    public function delete($id){

    }

    public function submit($id=null){

    }
    public function update($id){

    }
}