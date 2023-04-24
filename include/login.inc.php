<?php

if(isset($_POST['login'])){

    $user = $_POST["user"];
    $pwd = $_POST["pass"];

    require_once 'dbh.inc.php';
    require_once 'function.inc.php';

    if(emptyInputLogin ($user,$pwd) !== false){
        header("location: ../login.php?error=emptyInput");
        exit();
    }

    loginUser($conn,$user,$pwd);
}
else{
    header("location: ../login.php");
        exit();
}