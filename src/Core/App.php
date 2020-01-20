<?php

namespace App\Core;



class App{

    /**
     * @var string
     */
    protected $controller = 'homeController';

    /**
     * @var string
     */
    protected $action = 'index';
    /**
     * @var array
     */
    protected $params = [];

    protected $root;

    public function __construct()
    {
        $this->prepareURL();
        
        //Define class with it namespace 
        $controller = ($this->root == 'admin') ?  'App\\Controllers\\Admin\\' . $this->controller : 'App\\Controllers\\' . $this->controller;
        if(class_exists($controller)){
            //Set the Class
            $this->controller = new $controller;
            $action = str_replace('-', '', $this->action);
            if(method_exists($this->controller, $action)){
                call_user_func_array([$this->controller, $action], $this->params);
            }else{
                $this->controller->errorPage();
            }
        }else{
            $this->controller->errorPage();
        }

    }

    /**
     * Prepare URL For parsing
     * @return void
     */
    protected function prepareURL()
    {
        $request = trim($_SERVER['REQUEST_URI'], '/');
        if(!empty($request)){
            $url = explode('/', $request);
            if($url[0] == 'admin'){
                $this->controller = isset($url[1]) ? $url[1] . 'Controller' : 'homeController';
                $this->action = $url[2] ?? 'index';
                unset($url[1], $url[2]);
                $this->params = !empty($url) ? array_values($url) : [];
                return $this->root = 'admin';
            }else{
                $this->controller = isset($url[0]) ? $url[0] . 'Controller' : 'homeController';
                $this->action = $url[1] ?? 'index';
                unset($url[0], $url[1]);
                $this->params = !empty($url) ? array_values($url) : [];
                return $this->root = 'salam';
            }
        }
    }

}