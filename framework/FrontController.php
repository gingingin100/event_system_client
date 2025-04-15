<?php
namespace Framework;
final class FrontController{
    private $loader;
    private $route;
    public function __construct(){
        $this->autoloader();
        $this->route = new \Framework\Routes\Router();
    }

    public function autoloader(){
        $this->loader = new \Framework\Psr4AutoloaderClass();
        $this->loader->register();
        $this->loader->addNamespace('App',APP_DIR);
        $this->loader->addNamespace('App\\Controllers', CONTROLLER_DIR);
        $this->loader->addNamespace('App\\Models', MODEL_DIR);
        $this->loader->addNamespace('App\\Views', VIEW_DIR);
        $this->loader->addNamespace('Framework', FRAMEWORK_DIR);
        $this->loader->addNamespace('Framework\\Abstracts', ABSTRACT_DIR);
        $this->loader->addNamespace('Framework\\Routes', ROUTE_DIR);
        $this->loader->addNamespace('Framework\\Layout',LAYOUT_DIR);
    }

    public function run(){
        ini_set('display_errors',1);
        error_reporting(E_ALL);

        $separators = ['/','\\'];

        $request_url = explode('?',$_SERVER['REQUEST_URI'],2);
        $path = str_replace(APP_ROOT_DIR, '', $request_url[0]);
        $path = trim(str_replace($separators, DIRECTORY_SEPARATOR, $path), DIRECTORY_SEPARATOR);
        $router = $this->route;

        if(!$router->route($path)){
            header("HTTP/1.0 404 Not Found");
            echo json_encode(["error"=>"404 $path NotFound"]);
        }
    }
}