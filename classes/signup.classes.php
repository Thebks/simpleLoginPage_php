<?php

class signup extends dbh{

    protected function setUser($firstName, $lastName, $email, $pass){
        $stmt = $this->connection->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (?,?,?,?);");

        if(!$stmt->execute(array($firstName, $lastName, $email, $pass))) {
            $stmt = null;
            header("Location: ../index.signup.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }

    protected function checkUser($email){
        $stmt = $this->connection()->prepare('SELECT email FROM users WHERE email = ?;');

        if(!$stmt->execute($email)){
            $stmt = null;
            header("Location: ../index.signup.php?error=stmtfailed");
            exit();
        }

        $resultCheck = false;
        if($stmt->rowCount() > 0){
            $resultCheck = false;
        }
        else {
            $resultCheck = true;
        }
        return $resultCheck;
    }
}