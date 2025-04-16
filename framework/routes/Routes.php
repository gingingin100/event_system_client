<?php
namespace Framework\Routes;

final class Routes {
    public function route_list() {
        return [
            '/' => [
                'controller' => 'EventController',
                'httpMethods' => [
                    'GET' => 'home', 
                    'POST' => 'submit', 
                ],
            ],
            '/register' => [
                'controller' => 'AuthController',
                'httpMethods' => [
                    'GET' => 'index', 
                    'POST' => 'submit', 
                ],
            ],
            '/login' => [
                'controller' => 'AuthController',
                'httpMethods' => [
                    'GET' => 'index', 
                    'POST' => 'login', 
                ],
            ],
            '/user' => [
                'controller' => 'AuthController',
                'httpMethods' => [
                    'GET' => 'index', 
                    'POST' => 'submit', 
                ],
            ],
            '/events' => [
                'controller' => 'EventController',
                'httpMethods' => [
                    'POST' => 'submit',  
                    'GET' => 'index',   
                ],
            ],
            '/events/{id}' => [
                'controller' => 'EventController',
                'httpMethods' => [
                    'GET' => 'index',   
                    'PUT' => 'update',  
                    'DELETE' => 'delete', 
                ],
            ],
            '/events/{id}/register' => [
                'controller' => 'UserRegController',
                'httpMethods' => [
                    'GET' => 'index', 
                    'POST' => 'submit',  
                ],
            ],
            '/users/{id}/events' => [
                'controller' => 'UserRegController',
                'httpMethods' => [
                    'GET' => 'index', 
                ],
            ],
            '/logout'=>[
                'controller'=>'AuthController',
                'httpMethods'=>[
                    'GET'=>'logout'
                ]
            ],
            '/user_dash'=>[
                'controller'=>'UserDashController',
                'httpMethods'=>[
                    'GET'=>'index'
                ]
                ],
            '/event_dash'=>[
                'controller'=>'EventDashController',
                'httpMethods'=>[
                    'GET'=>'index'
                ]
            ]
    ];
    }
}





















