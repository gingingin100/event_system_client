<?php

namespace App\Controllers;

final class AuthController extends \Framework\Abstracts\Controller{
    // public function index($id=null){
    //     $event = $this->event;
    //     $response = $event->sendHttpRequest('GET','http://'.TEST_SERVER.'/db','auth',["received" => [
    //         "email"=>$_SESSION['email'],
    //         ]]);
    //     echo $response;
    //     $render = $this->renderer;
    //     $render->render("test",["id"=>$id]);
    // }

    public function index($id=null){
        $render = $this->renderer;
        $render->render("login");
    }
    
    public function submit($id=null){
        $data = $_POST;
        if (!isset($data['name']) || !isset($data['email']) || !isset($data['password'])) {
            echo json_encode(["error" => "Missing fields"]);
            exit;
        }
        $event = $this->event;

        $name = $data['name'];
        $email = $data['email'];
        $password = password_hash($data['password'], PASSWORD_BCRYPT);
        $api_key = substr(md5(uniqid(mt_rand(), true)), 0, 12);

        $response = $event->sendHttpRequest('POST','http://'.TEST_SERVER.'/register','auth',["received" => [
        "name"=>$name,
        "email"=>$email,
        "password"=>$password,
        "api_key"=>$api_key
        ]]);
        $render = $this->renderer;
        $render->render("new_user");
    }

    public function delete($id){
        
    }
    public function update($id){
        
    }

    public function login(){
        $data = $_POST;
        if (!isset($data['email']) || !isset($data['password'])) {
            echo json_encode($data);
            echo json_encode(["error" => "Missing fields on login?"]);
            exit;
        }   

        $event = $this->event;
        $response = $event->sendHttpRequest('POST','http://'.TEST_SERVER.'/register','auth',["received" => [
            "email"=>$data['email'],
            "password"=>$data['password'],
            ]]);
        $_SESSION['api_key'] = json_decode($response,true)['api_key'];
        $_SESSION['email'] = $data['email'];
        // echo $_SESSION['api_key'];
        echo $response;
        header('Location: /'.APP_ROOT_DIR);
    }

    public function logout(){
        if(!isset($_SESSION['api_key'])){
            echo json_encode(["error" => "Missing fields on logout"]);
            exit;
        }
        $event = $this->event;
        $response = $event->sendHttpRequest('POST','http://'.TEST_SERVER.'/register','auth',["received" => [
            "api_key"=>$_SESSION['api_key'],
            "logout"=> true
            ]]);
        unset($_SESSION['api_key']);
        header('Location: /'.APP_ROOT_DIR);
    }
    
}