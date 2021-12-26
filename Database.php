<?php

class dbh {
    protected function connection(){
        try {
            $username = "root";
            $password = "rootadmin";
            $db = new PDO('mysql:host=172.18.0.4;dbname=loginproject', $username, $password);
            return $db;
        }
        catch (PDOException $e){
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}
/*class Database {
    protected static $instance;
    protected $pdo;
    
    protected function __construct()
    {
        $this->pdo =new PDO("mysql:host=".DB_HOST."; dbname=".DB_NAME, DB_USER, DB_PASS);
        
    }

    public static function instance(){
        if(self::$instance===null){
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function __call($method, $arguments) //gives access to the mysql methods and arguments
    {
        call_user_func_array(array($this->pdo, $method), $arguments);
        var_dump($method);
    }
}*/