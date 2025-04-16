<?php

namespace App\Controllers;

final class UserDashController extends \Framework\Abstracts\Controller{
    public function index(){
        $render = $this->renderer;
        $event = $this->event;
        $response1 = $event->sendHttpRequest('GET','http://'.TEST_SERVER.'/user','auth',['email'=>$_SESSION['email']]); 
        $id = json_decode($response1,true)['id'];
        $response = $event->sendHttpRequest('GET', 'http://'.TEST_SERVER.'/users/'.$id.'/events','reg');
        $render->render('user_dashboard',["event_list"=>$response]);
    }

    public function delete($id){

    }

    public function submit($id=null){

    }
    public function update($id){

    }
}