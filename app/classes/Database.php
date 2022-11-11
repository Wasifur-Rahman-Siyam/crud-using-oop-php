<?php


namespace App\classes;


class Database {
    public $dbHost,$dbUserName,$password,$dbName;
    public function __construct($db)
    {
        $this->dbHost       = 'localhost';
        $this->dbUserName   = 'root';
        $this->password     = '';
        $this->dbName       = $db;
    }
    public function dbConnect(){
        $connection = mysqli_connect($this->dbHost,$this->dbUserName,$this->password,$this->dbName);
        return $connection ;
    }
}