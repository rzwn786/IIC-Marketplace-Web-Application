<?php

if(isset($_POST["submit"])){
    
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $user = $_POST["user"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $pwd = $_POST["pass"];
    $pwdRepeat = $_POST["confirm_pass"];

    require_once 'dbh.inc.php';
    require_once 'function.inc.php';

    if(emptyInputSignup ($fname,$lname, $user, $email,$phone,$pwd,$pwdRepeat) !== false){
        header("location: ../signup.php?error=emptyInput");
        exit();
    }
    if(InvalidVid($user) !== false){
        header("location: ../signup.php?error=invalidVid");
        exit();
    }
    if(InvalidEmail($email) !== false){
        header("location: ../signup.php?error=invalidEmail");
        exit();
    }
    if(pwdMatch($pwd,$pwdRepeat) !== false){
        header("location: ../signup.php?error=passworddontmatch");
        exit();
    }
    if(uidExists($conn,$user,$email) !== false){
        header("location: ../signup.php?error=usernameTaken");
        exit();
    }

    createUser($conn,$fname,$lname,$user,$email,$phone,$pwd,$pwdRepeat);
}

    

else{
    header("location: ../signup.php");
    exit();
}

