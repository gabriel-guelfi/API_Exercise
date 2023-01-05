<?php

/*index é aonde acontece o roteamento das URLS. */


class Router
{

    function __construct()
    {
        define('INCLUDE_PATH', __DIR__);
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        session_start();

        include_once './Core/connection.php';
        include_once './Services/animal_service.php';

        if (!empty($_GET['f'])) {
            $route = $_GET['f'];
            $this->$route();
        } else $this->mainpage();

        //Why should i use $this->mainpage instead of just mainpage()?
        /*A: Because inside the __construct, mainpage() doesn't exist. When i use "this", i'm 
    referring to the current class (Router) and therefore mainpage() is found. */
    }

    public function mainpage()
    {
        echo "This is a header to the main page";
    }

    public function list_Animals_Index()
    {
        include_once './Templates/list.php';
    }
}

new Router();
