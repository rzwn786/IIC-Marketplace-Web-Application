<?php
include_once 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style/loginstyle1.css?v=<?php echo time(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body> 

      <div class="container">
        <div class="title">Login</div>
          <div class="content">
          <form class="form" action="include/login.inc.php" method="post">
            <div class="user-details">
              <div class="input-box">
                <span class="details" for=user >Username</span>
                <input type="text" name="user" id="user" >
              </div>
            <div class="input-box">
                <span class="details"for="pass">Passward</span>
                <input type="password" name="pass" id="pass" >
            </div>  
          </div>
        </div>
              <button type="submit" name="login" class="button">Log in</button> 
          </form></br>
          <?php

if(isset($_GET['error'])){
    if($_GET['error']=="wrongpassword"){
        echo "<p1>Wrong Passord</p1>";
    }
    else if($_GET['error']=="noDataFound"){
        echo "<p1>Account not found</p1>";
    }
    else if($_GET['error']=="emptyInput"){
        echo "<p1>Please fill in all field</p1>";
    }
}
?>
       </div>  
       </div>   
</body>
</html>
<?php 
include_once 'footer.php';
?>