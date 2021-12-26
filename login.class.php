<?php

class Login extends dbh {
    protected function getUser($email, $pass) {
        $stmt = $this->connection()->prepare('SELECT password FROM users WHERE email=? OR password = ?;');

        if(!$stmt->execute(array($email, $pass))) {
            $stmt = null;
            header("Location: ./index.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() == 0){

            $stmt = null;
            header("Location: ./index.php?error=usernotfound");
            exit();
        }

        $passHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (strcmp($pass , $passHashed[0]["password"]) == 0) {
            $checkPass = true;
        } else {
            $checkPass = false;
        }

        // echo $pass . $passHashed[0]["password"];
        // exit();

        if($checkPass == false){
            $stmt = null;
            header("Location: ./index.php?error=wrongpassword");
            exit();
        }
        elseif($checkPass == true){
            $stmt = $this->connection()->prepare('SELECT * FROM users WHERE email=? AND password=?;');

            if(!$stmt->execute(array($email, $pass))){
                $stmt = null;
                header("Location: ./index.php?error=stmtfailed");
                exit();
            }
            if($stmt->rowCount() == 0){
                $stmt = null;
                header("Location: ./index.php?error=usernotfound");
                exit();
            }

            $user  = $stmt->fetchAll(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION["userid"] = $user[0]["id"];
            $_SESSION["useremail"] = $user[0]["email"];

            $stmt = null;
        }

        $stmt = null;
    }
}