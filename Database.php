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