<?php

if(isset($_POST)){

    //grabbing the data
    $email = $_POST["email"];
    $pass = $_POST["pass"];

    //instantiate logincontrollerclass

    include "./Database.php";
    include "./login.class.php";
    include "./login.ctrl.php";

    $login = new LoginController($email, $pass);

    //runn error handlers

    $login->loginUser();

    header("Location: ./index.php?error=none");
} else {
    print_r($_POST);
}