<?php
include_once 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style/signupstyle1.css?v=<?php echo time(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
  <div class="container">
    <div class="title">Sign Up</div>
    <div class="content">
      <form method="post" action="include/signup.inc.php">
        <div class="user-details">
          <div class="input-box">
            <span class="details" for="fname">First Name</span>
            <input type="text"name="fname" id="fname" >
          </div>
          <div class="input-box">
            <span class="details" for="fname">Last Name</span>
                <input type="text" name="lname" id="lname" >
          </div>
          <div class="input-box">
            <span class="details" for=user >Username</span>
                <input type="text" name="user" id="user" >
          </div>
          <div class="input-box">
            <span class="details"for="email">Email</span>
                <input type="text" name="email" id="email" >
          </div>
          <div class="input-box">
            <span class="details"for="pass">Passward</span>
                <input type="password" name="pass" id="pass" >
          </div>
          <div class="input-box">
            <span class="details"for="confirm_pass">Confirm Passward</span>
            <input type="password" name="confirm_pass" id="confirm_pass" >
        </div>
          <div class="input-box">
            <span class="details"for="phone">Phone</span>
            <input type="number" name="phone" id="phone" >
          </div>
        </div>
        </div>
        
        <button type="submit" name="submit" class="button">Sign Up</button>
        
      </form></br>
      <?php
          if(isset($_GET['error'])){
              if($_GET['error']=="emptyInput"){
                  echo "<p1>Please fill in all field</p1>";
              }
              else if($_GET['error']=="invalidVid"){
                  echo "<p1>Use proper username</p1>";
              }
              else if($_GET['error']=="invalidEmail"){
                  echo "<p1>Use proper email</p1>";
              }
              else if($_GET['error']=="passworddontmatch"){
                  echo "<p1>Password dost match</p1>";
              }
              else if($_GET['error']=="stmtfailed"){
                  echo "<p1>Something when wrong , try again</p1>";
              }
              else if($_GET['error']=="usernameTaken"){
                  echo "<p1>Username already taken</p1>";
              }
              else if($_GET['error']=="none"){
                  echo "<h1>Successfully Sign Up</h1>";
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