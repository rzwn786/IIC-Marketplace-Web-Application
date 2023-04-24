<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style/header.css?v=<?php echo time(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="img/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
</head>
<body>

<nav class="header" >
    <a href="home.php" >
        <img src="img/logo4.png" class="logo">
    </a>
   <a href="#" class="toggle-button" >
    <span class="bar"></span>
    <span class="bar"></span>
    <span class="bar"></span>
   </a>
   <div class="header-link">
   <ul>
        <?php
        if(isset($_SESSION["userid"])){
            echo "<div class='dropdown'>";
            echo "<button class='dropbtn'><i class='fa fa-user-plus'></i>&nbsp;$_SESSION[useruid]</a></li></button>";
            echo "<div class='dropdown-content'>";
            echo "<a href='profile.php'>Profile</a>";
            echo "<a href='myads.php'>MyAds</a>";
            echo "</div>";
            echo "</div>";

            //echo "<li><a href='profile.php'><i class='fa fa-user-plus'></i>&nbsp;$_SESSION[useruid]</a></li>";
            echo "<li><a href='include/logout.inc.php'>Logout</a></li>";
        }
        else{
            echo "<li><a href='signup.php'><i class='fa fa-user-plus'></i>&nbsp;Sign Up</a></li>";
            echo "<li><a href='login.php'><i class='fa fa-sign-in'></i>	&nbsp;Login</a></li>";
        }
        ?>
    </ul>
   </div>
</nav>

</body>
</html>