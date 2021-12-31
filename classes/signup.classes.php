<?php

class signup extends dbh{

    protected function checkUser($email){
        $stmt = $this->connection()->prepare('SELECT id FROM users WHERE id = ? OR email = ?;');

        if(!$stmt->execute(array($email))){
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