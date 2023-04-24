<?php
session_start();
include_once 'include/dbh.inc.php';
include_once 'header.php';

//Get listing id from db
if(isset($_GET['listingid'])){
    $sql = "SELECT u.firstName,u.lastName,u.userPhone,u.useremail,l.item_title,l.item_price,l.item_categories,l.item_condition,l.item_description,l.item_location,l.item_cod,l.item_postage,l.created_date,l.item_image,l.listingid FROM users
    AS u INNER JOIN listing AS l ON (u.usersId = l.user_Id) WHERE l.listingid =".$_GET['listingid'];
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/listing.css?v=<?php echo time(); ?>">
    <title><?php echo $row['item_title'] ?></title>
</head>
<body>
    <div class="navbar">
        <a href="#all">ALL CATEGORIES</a>
        <a href="#vehicle">VEHICLES</a>
        <a href="#electronic">ELECTRONICS</a>
        <a href="#personal">HOME & PERSONAL ITEMS</a>
        <a href="#hobbies">LEISURE/SPORTS/HOBBIES</a>
        <a href="#jobs">JOBS & SERVICES</a>
        <div class="search-container">
            <form action="#">
                <input type="text" placeholder="What are you looking for" name="search">
                <button type="submit">Find</button>
            </form>
        </div>
    </div>
    <div class="button">
        <button type="button" onclick="history.back()" title="Back"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
    </div>
    <div class="flex-container">
        <div class="box">
            <div class="box1">
                <div class="title">
                    <h1><?php echo $row['item_title'] ?></h1>
                </div>
                <div class="atasgambar">
                    <div class="listingid">
                        <p>List ID:&nbsp;<?php echo $row['listingid'] ?></p>
                    </div>
                    <div class="created-date">
                        <p>Posted Date: <?php echo $row['created_date'] ?><p>
                    </div>
                </div>
                <div class="image">
                    <img src="uploads/<?php echo $row['item_image']; ?>">
                </div>
            </div>
            <div class="box2">
                <div class="price">
                    <h2>RM&nbsp;<?php echo $row['item_price'] ?><h2>    
                </div>
                <div class="location">
                    <p>Location:&nbsp;<?php echo $row['item_location'] ?><p>
                </div>
                <div class="condition">
                    <p>Condition:&nbsp;<?php echo $row['item_condition'] ?><p>    
                </div>
                <div class="cod">
                    <p>Cash On Delivery:&nbsp;<?php echo $row['item_cod'] ?><p>    
                </div>
                <div class="postage">
                    <p>Postage:&nbsp;<?php echo $row['item_postage'] ?><p>    
                </div>
                <div class="posted-by">
                    <p><i class="fa fa-user" aria-hidden="true">&nbsp;</i><?php echo $row['firstName']." ".$row['lastName'] ?></p>
                </div>
                <div class="contact-seller">
                    <div class="whatsapp-seller">
                        <a href="https://wa.me/60<?php echo $row['userPhone']?>" target="_blank" ><i class="fab fa-whatsapp" aria-hidden="true" title="Whatsapp Seller"></i></a>
                    </div>
                    <div class="email-seller">
                        <a href="mailto:<?php echo $row['useremail']?>" target="_blank" ><i class="fa fa-envelope" aria-hidden="true" tooltip="Email Seller" title="Email Seller"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="description-box">
            <div class="title">
                <h4>Description</h4>
            </div>
            <div class="description">
                <p><?php echo $row['item_description'] ?><p>    
            </div>
        </div>
    </div>
</body>
</html>
<?php
include 'footer.php';
?>