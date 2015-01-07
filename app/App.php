<?php

//echo 'App';
class App {
    
    protected $controller = 'home';
    protected $method = 'index';
    protected $params = [];
    

    public function __construct() {
        session_start();
        $url = $this->parseUrl();
        //print_r($url);
        //echo __DIR__.'/controllers/'.$url[0].'.php';
        //echo $boolarray[file_exists(__DIR__.'/controllers/'.$url[0].'.php')];	
        if (file_exists(dirname(__FILE__) . '/controllers/' . $url[0] . '.php')) {//__DIR__ OR dirname( __FILE__ ) is IMPORTANT!!!!!!!!!!!
            $this->controller = $url[0];
            unset($url[0]);
        }
        require_once dirname(__FILE__) . '/controllers/' . $this->controller . '.php'; //require controller class .php file
        //require_once 'controllers/controller.php';
        $this->controller = new $this->controller; //create Home instance IMPORTANT!!!!!!!!!!		
        //var_dump($this->controller);
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                //echo 'Ok! Method '.$url[1]. ' exists.';
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        //print_r($url);
        $this->params = $url ? array_values($url) : [];
        call_user_func_array([$this->controller, $this->method], $this->params);
        //session_start();
//        if (isset($_COOKIE["PHPSESSID"])) {
//            $k = $_COOKIE["PHPSESSID"];
//            $token = strtok($k, "-");
//            echo "$token";
//            $token = strtok("-");
//            echo "$token";
//        }
    }

    private function parseUrl() {
        if (isset($_GET['url'])) {
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }

}
