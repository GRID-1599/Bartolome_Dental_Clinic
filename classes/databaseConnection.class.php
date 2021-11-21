<?php

class DatabaseConnection {
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $databaseName = 'dentalclinic_system';

    protected function connect(){
        try{
            $dsn = 'mysql:host='. $this->host .';dbname='. $this->databaseName;
            $pdo =  new PDO($dsn, $this->user, $this->password);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
            return $pdo;
        }catch(PDOException $e){
            print "Error: " .$e->getMessage() . "<br/>";
            die();
        }
        
    }
}



