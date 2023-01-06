<?php 

/* A API é um Endpoint de dados, ou seja, uma classe ou arquivo de rotas que retorna somente dados. 
*/

class Api{

function __construct()
{
    // session_start();

    define('INCLUDE_PATH' , __DIR__);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    session_start();

//"How to display all php errors ?"

    if(!empty($_GET['f'])){
        $route = $_GET['f'];
            $this->$route();
    }
}

public function list_Animals_Template() {
    // include_once './Templates/list.php';
    include_once './Services/animal_service.php';
    $animal_service = new Service;
    $this->respond($animal_service->listUsers());
}
    
    
private function respond($dados){
    header('Content-Type: application/json');
    echo json_encode($dados);
}


}
new Api();
