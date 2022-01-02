<?php

class signupCtrl extends signup {

    private $firstName;
    private $lastName;
    private $email;
    private $pass;
    private $passRepeat;

    public function __construct($firstName, $lastName, $email, $pass, $passRepeat){

        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->pass = $pass;
        $this->passRepeat = $passRepeat;
        
    }

    public function signupUser(){

        if($this->emptyInput() == false){
            echo  "empty input!";
            header("Location: ../index.signup.php?error=emptyinput");
            exit();
        }

        if($this->invalidEmail() == false){
            echo "Invalid Email!";
            header("Location: ../index.signup.php?error=email");
            exit(); 
        }

        if($this->passMatch() == false){
            echo "password doesnt match!";
            header("Location: ../index.signup.php?error=password");
            exit();
        }

        if($this->userExistCheck() == false){
            echo "user already exist";
            header("Location: ../index.signup.php?error=emailtaken");
            exit();
        }

        $this->setUser($this->firstName, $this->lastName, $this->email, $this->pass);

    }

    private function emptyInput(){

        $result = false;
        
        if (empty($this->firstName) || empty($this->lastName) || empty($this->email) || empty($this->pass) || empty($this->passRepeat)){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;

    }

    private function invalidEmail(){
        $result = false;

        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){

            $result= false;
        }
        else{
            $result = true;
        }
        return $result;
    }

    private function passMatch(){
        $result = false;

        if($this->pass !== $this->passRepeat){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }

    private function userExistCheck(){
        $result = false;
        if (!$this->checkUser($this->email)){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }
}