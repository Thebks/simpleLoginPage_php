<?php

if (isset($_POST["submit"])){

    //grabbing the data
    $firstName = $_POST["first_name"];
    $lastName = $_POST["last_name"];
    $email = $_POST["email"];
    $pass = $_POST["password"];
    $passRepeat = $_POST["passrepeat"];

    //signup controller class
    
    include "../Database.php";
    include "../classes/signup.classes.php";
    include "../classes/signup.ctrl.php";
    

    $signup = new signupCtrl($firstName, $lastName, $email, $pass, $passRepeat);

    //error handlers
    
    $signup->signupUser();


    //going back
    header("Location: ../index.php?error=none");

}