<?php
session_start();
if(!isset($_SESSION['userid'])){
    header('Location:login.php');
}
include_once 'header.php';
include_once 'include/dbh.inc.php';

if(isset($_POST['submit']) && isset($_FILES['upload_file'])){
    
    //image upload
    $fileName = $_FILES['upload_file']['name'];
    $fileTmpName = $_FILES['upload_file']['tmp_name'];
    $fileSize = $_FILES['upload_file']['size'];
    $fileError = $_FILES['upload_file']['error'];

    if($fileError === 0){
        if($fileSize < 5000000){
            $File_ex = pathinfo($fileName, PATHINFO_EXTENSION);
            $File_ex_lower = strtolower($File_ex);
            $allowed = array('jpg','jpeg','png');

            if(in_array($File_ex_lower, $allowed)){
                $new_file_name = uniqid("IMG-",true).".".$File_ex_lower;
                $img_path = "uploads/".$new_file_name;
                move_uploaded_file($fileTmpName,$img_path);
            }
            else{
                $errorMessage = "Not supported this type of file";
                header("Location: sell.php?error=$errorMessage");
            }
        }
        else{
            $errorMessage = "Image is to big";
            header("Location: sell.php?error=$errorMessage");
        } 
    }
    else{
        $errorMessage = "unable to upload image";
        header("Location: sell.php?error=$errorMessage");
    }

    $userid = $_SESSION['userid'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $categeries = $_POST['categories'];
    $condition = $_POST['condition'];
    $description = $_POST['description'];;
    $location = $_POST['location'];
    $cod = $_POST['cod'];
    $postage = $_POST['pos'];
    

    $sql ="INSERT INTO listing (user_id,item_title,item_price,item_categories,item_condition,item_description,item_location,item_cod,item_postage,created_date,item_image)
    VALUES('$userid','$title','$price','$categeries','$condition','$description','$location','$cod','$postage',NOW(),'$new_file_name')";

    if(mysqli_query($conn,$sql)){
        $message ="Item Succesfully Added";

        echo "<script>alert('$message')
                window.location.replace('home.php')
              </script>";
    }
    else{
        echo '<script>alert("Failed to add item")</script>';
        echo "<h1>Error: </h1>" . $sql . "<br>" . mysqli_error($conn);
        ini_set('display_errors', 1);
        mysqli_error($conn);
    }
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style/sell.css?v=<?php echo time(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="script/imagePreview.js" defer></script>
    <title>Sell Page</title>
</head>
<body>
    <div class="flex-container">
        <div class="title">
            <h3>Create New Listing</h3>
        </div>
        <div class="wrapper">
            <div class="showcase" >
                <div class="btn">
                    <button type="button" onclick="remove()"><i class="fa fa-close" aria-hidden="true"></i></button>
                </div>
                <img src="img/insert.png"  id="image_preview" >
                <p>Image Preview</p>
            </div>
            <div class="form">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="input-group">
                        <label>Photo</label>
                        <div class="addphoto">
                            <input type="file" id="upload_file"  name="upload_file" onchange="loadFile(event)"  accept="image/jpg, image/jpeg, image/png" required>
                            <label for="upload_file"><i class="fa fa-plus" aria-hidden="true"><p>Click to add photo</p></i></label>
                            <?php if(isset($_GET['error'])): ?>
                                <p><?php echo $_GET['error']; ?></p>                   
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="input-group">
                        <label>Title</label>
                        <input type="text" name="title" maxlength="40" >
                    </div>
                    <div class="input-group">
                        <label>Price</label>
                        <input type="number" name=price >
                    </div>
                    <div class="input-group">
                        <label>Categories</label>
                        <select name="categories">
                            <option value="VEHICLES">VEHICLES</option>
                            <option value="ELECTRONICS">ELECTRONICS</option>
                            <option value="HOME & PERSONAL ITEMS">HOME & PERSONAL ITEMS</option>
                            <option value="LEISURE/SPORTS/HOBBIES">LEISURE/SPORTS/HOBBIES</option>
                            <option value="JOBS & SERVICES">JOBS & SERVICES</option>
                            <option value="OTHERS">OTHERS</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <label>Condition</label>
                        <select name="condition">
                            <option value="new">New</option>
                            <option value="used">Used</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <label>Description</label>
                        <textarea name="description" row="50" cols="50" ></textarea>
                    </div>
                    <div class="input-group">
                        <label>Location</label>
                        <input type="text" name="location" id="autocomplete" placeholder="Search Place">
                    </div>
                    <div class="input-group">
                        <p>Cash On Delivery</p>
                        <div class="row">
                            <input type="radio" name="cod" value="Available">
                            <label>Yes</label>
                            <input type="radio" name="cod" value="Not Available">
                            <label>no</label>
                        </div>
                    </div>
                    <div class="input-group">
                        <p>Postage</p>
                        <div class="row">
                            <input type="radio" name="pos" value="Available">
                            <label>Yes</label>
                            <input type="radio" name="pos" value="Not Available">
                            <label>no</label>
                        </div>
                    </div>
                    <div class="input-group">
                        <input type="submit" name="submit">
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