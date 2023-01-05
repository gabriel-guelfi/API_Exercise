<?php

/* Na Service se faz a conexão ao banco de dados, já que para toda e qualquer operação 
(CRUDE) é necessária a conexão ao db. Fora a cnn, somente operações CRUDE pertencem aqui.  */

Class Service{

   protected $mysqli_service;

    function __construct()
    {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        include_once './Core/connection.php';

        $credentials = [
            'hostname' => 'localhost',
            'username' => 'root',
            'password' => 3005,
            'database' => 'animals',
            'port' => 3306
        ];

        $this->mysqli_service = new Connection($credentials);
        
    }

    function listUsers() {
        $query = 'SELECT * FROM animals.animal_table';
            $currentUsers = $this->mysqli_service->givenQuery($query);
            return json_encode($currentUsers);
    }
    
}

new Service();