<?php
session_start();
    if(!isset($_SESSION['userid'])){
        header('Location:login.php');
    }
    include_once 'include/dbh.inc.php';
    include_once 'header.php';


//Get listing id from db
if(isset($_GET['listingid'])){
    $sql = "SELECT u.firstName,u.lastName,u.userPhone,u.useremail,l.item_title,l.item_price,l.item_categories,l.item_condition,l.item_description,l.item_location,l.item_cod,l.item_postage,l.created_date,l.item_image,l.listingid FROM users
    AS u INNER JOIN listing AS l ON (u.usersId = l.user_Id) WHERE l.listingid =".$_GET['listingid'];
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    if(isset($_POST['update']) ){

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
                    header("Location: edit.listing.php?error=$errorMessage");
                }
            }
            else{
                $errorMessage = "Image is to big";
                header("Location: edit.listing.php?error=$errorMessage");
            } 
        }
        else{
            $errorMessage = "unable to upload image";
            header("Location: edit.listing.php?error=$errorMessage");
        }

        $title = $_POST['title'];
        $price = $_POST['price'];
        $categeries = $_POST['categories'];
        $condition = $_POST['condition'];
        $description = $_POST['description'];;
        $location = $_POST['location'];
        $cod = $_POST['cod'];
        $postage = $_POST['pos'];

        $update = "UPDATE listing SET item_title='$title', item_price='$price', item_categories='$categeries', item_condition='$condition', item_description='$description', item_location='$location', item_cod='$cod', item_postage='$postage',item_image='$new_file_name'
        WHERE listingid=".$_GET['listingid'];

        $up =mysqli_query($conn,$update);

        if(!isset($sql)){
            die("Error $sql".mysqli_connect_error());
        }
        else{
            $message ="Listing Succesfully Editted";

            echo "<script>alert('$message')
                    window.location.replace('myads.php')
                </script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="script/imagePreview.js" defer></script>
    <link rel="stylesheet" href="style/edit.listing.css?v=<?php echo time(); ?>">
    <title><?php echo $row['item_title'] ?></title>
</head>
<body>
<div class="button">
    <button type="button" onclick="history.back()" title="Back"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
</div>
<div class="flex-container">
        <div class="title">
            <h3>Edit Listing</h3>
        </div>
        <div class="wrapper">
            <div class="showcase" >
                <img src="img/insert.png" id="image_preview">
            </div>
            <div class="form">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="input-group">
                        <label>Photo</label>
                        <div class="addphoto">
                            <input type="file" id="upload_file"  name="upload_file" onchange="loadFile(event)"  accept="image/jpg, image/jpeg, image/png" required >
                            <label for="upload_file"><i class="fa fa-plus" aria-hidden="true"><p>Click to add photo</p></i></label>
                            <?php if(isset($_GET['error'])): ?>
                                <p><?php echo $_GET['error']; ?></p>                   
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="input-group">
                        <label>Title</label>
                        <input type="text" name="title" maxlength="40" value="<?php echo $row['item_title'] ?>" >
                    </div>
                    <div class="input-group">
                        <label>Price</label>
                        <input type="number" name=price value="<?php echo $row['item_price'] ?>">
                    </div>
                    <div class="input-group">
                        <label>Categories</label>
                        <select name="categories" value="<?php echo $row['item_categories'] ?>">
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
                        <select name="condition"  value="<?php echo $row['item_condition'] ?>" >
                            <option value="new">New</option>
                            <option value="used">Used</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <label>Description</label>
                        <textarea name="description" row="50" cols="50"><?php echo $row['item_description'] ?></textarea>
                    </div>
                    <div class="input-group">
                        <label>Location</label>
                        <input type="text" name="location" id="autocomplete" placeholder="Search Place" value="<?php echo $row['item_location'] ?>">
                    </div>
                    <div class="input-group">
                        <p>Cash On Delivery</p>
                        <div class="row">
                            <input type="radio" name="cod" value="Available" required>
                            <label>Yes</label>
                            <input type="radio" name="cod" value="Not Available" required>
                            <label>no</label>
                        </div>
                    </div>
                    <div class="input-group">
                        <p>Postage</p>
                        <div class="row">
                            <input type="radio" name="pos" value="Available" required>
                            <label>Yes</label>
                            <input type="radio" name="pos" value="Not Available" required>
                            <label>no</label>
                        </div>
                    </div>
                    <div class="input-group">
                        <input type="submit" name="update" value="Update">
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