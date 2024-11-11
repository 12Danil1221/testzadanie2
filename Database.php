<?php  

class Database{
    public $connection;
    public function __construct(){
        //Connect to MySQL.
        $conn = "mysql:host=localhost;dbname=myapp;port=3306";

        $this->connection = new PDO($conn, 'root', '');
    }
    public function query($query, $params = []){


        $query = $this->connection->prepare($query);

        $query->execute($params);

        return $query;
    }
}
