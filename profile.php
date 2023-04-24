<?php
session_start();
    if(!isset($_SESSION['userid'])){
        header('Location:login.php');
    }
include_once 'header.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once 'include/dbh.inc.php';


if (isset($_SESSION['userid'])){
    $sql = "SELECT firstName,lastName,useremail,userPhone,userPwd FROM users WHERE usersId=".$_SESSION['userid'];
    $result=mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);

    if(isset($_POST['update'])){

        $newfirstname = $_POST['firstname'];
        $newlastname = $_POST['lastname'];
        $newemail = $_POST['email'];
        $newphone = $_POST['phone'];
        $currentpassword = $_POST['currentpassword'];
        $newpassword = $_POST['newpassword'];

        

        if(password_verify($currentpassword,$row['userPwd'])){
            $hashedPwd =password_hash($newpassword,PASSWORD_DEFAULT);
            $update = "UPDATE users SET firstName='$newfirstname',lastName='$newlastname',useremail='$newemail',userPhone='$newphone',userPwd='$hashedPwd'
            WHERE usersId=".$_SESSION['userid'];
            $up = mysqli_query($conn,$update);

            if(!isset($sql)){
                die("Error $sql".mysqli_connect_error());

            }
            else{
                $message = "Profile updated";
                header("Location: profile.php?message=$message");
            }
        }
        else{
            $message = "Current password is incorrect";
            header("Location: profile.php?message=$message");
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style/profile.css?v=<?php echo time(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <div class="flex-container">
        <div class="box">
            <div class="profile-pic">
                <form enctype="multipart/form-data">
                    <div class="image">
                        <img src="img/user.png">
                    </div>
                    <!--<div class="addPhoto">
                        <input type="file" name="profilepicture" id="profilepicture" accept="image/jpg, image/jpeg, image/png" >
                        <label for="profilepicture"><i class="fa fa-plus" aria-hidden="true"><p>Click to add photo</p></i></label>
                    </div>
                    <div class="button">
                        <input type="submit" name="saveimage" value="saveimage" >
                    </div>-->
                </form>
            </div>
            <div class="user-details">
                <form action="" method="post">
                    <div class="input-group">
                        <label>First Name</label>
                        <input type="text" name="firstname" value="<?php echo $row['firstName'] ?>">
                    </div>
                    <div class="input-group">
                        <label>Last Name</label>
                        <input type="text" name="lastname" value="<?php echo $row['lastName'] ?>">
                    </div>
                    <div class="input-group">
                        <label>Email</label>
                        <input type="text" name="email" value="<?php echo $row['useremail'] ?>">
                    </div>
                    <div class="input-group">
                        <label>Phone</label>
                        <input type="text" name="phone" value="<?php echo $row['userPhone'] ?>">
                    </div>
                    <div class="input-group">
                        <label>Current Password</label>
                        <input type="text" name="currentpassword">
                    </div>
                    <div class="input-group">
                        <label>New Password</label>
                        <input type="text" name="newpassword">
                    </div>
                    <div class="button">
                        <input type="submit" name="update">
                    </div>
                    <div class="message">
                        <?php if(isset($_GET['message'])): ?>
                            <p><?php echo $_GET['message']; ?></p>                   
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php 
include_once 'footer.php';
?>