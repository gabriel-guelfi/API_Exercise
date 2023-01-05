<?php

class Connection
{

    protected $mysqli;

    function __construct($credentials)
    {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        

        try {
            $this->mysqli = new mysqli(
                $credentials['hostname'],
                $credentials['username'],
                $credentials['password'],
                $credentials['database'],
                $credentials['port']
            );
        } catch (Exception $exc) {
            echo "could not connect, here's the error:" . $exc;
        };
        if ($this->mysqli->connect_error) {
            die('Connect Error (' . $this->mysqli->connect_errno . ') ' . $this->mysqli->connect_error);
        }
    }

    function givenQuery($query) {
        if(str_contains($query, 'SELECT')) {
            $selectObj = $this->mysqli->query($query);
            $infoDatabase =[];
            while( $info = $selectObj->fetch_assoc()) {
                $infoDatabase[] = $info;
            }
            return $infoDatabase;
        } else {
           return $this->mysqli->query($query);
        }
    }
}
