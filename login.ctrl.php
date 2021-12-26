<?php

class LoginController extends Login {

    private $email;
    private $pass;

    public function __construct($email, $pass) {
        $this->email = $email;
        $this->pass = $pass;
    }

    public function LoginUser() {
        if($this->emptyInput() == false) {
            header("Location: ./index.php?error=emptyInput");
            exit();
        }
        $this->getUser($this->email, $this->pass);
    }

    private function emptyInput() {
        
        $result = false;
        if(empty($this->email) || empty($this->pass)){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }
}

