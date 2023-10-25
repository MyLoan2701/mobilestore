<?php
class App{

    protected $controller = "home";
    protected $action = "show";
    protected $params = [];

    function __construct()
    {
        $arr = $this->UrlProcess();
        //print_r($arr);

        //Xu ly Controller
        if (file_exists("./mvc/controllers/".$arr[0].".php")) {
            //require_once "./mvc/controllers/".$arr[0].".php";
            $this->controller = $arr[0];
            unset($arr[0]);
        }
        require_once "./mvc/controllers/".$this->controller.".php";
        $this->controller = new $this->controller;

        //Xu lý Action (Function)
        if (isset($arr[1]))
        {
            if (method_exists($this->controller, $arr[1]))
            {
                $this->action = $arr[1];
            }
            unset($arr[1]);
        }

        //Xu ly Params
        
        $this->params = $arr?array_values($arr):[];

        call_user_func_array([$this->controller, $this->action], $this->params);
        
    }

    function UrlProcess() {
        // if (isset($_SERVER['REQUEST_METHOD']) == 'GET') {
        //     # code...
        // }
        if (isset($_GET["url"]))
        {
            //remove whitespace and split by /
            return explode("/", filter_var(trim($_GET["url"], "/")));
            // return explode("/", trim($_GET["url"]));
        }
        else {
            return explode("/", "home");
        }
        
    }
}
?>