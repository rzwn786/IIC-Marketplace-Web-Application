<?php
session_start();
    if(!isset($_SESSION['userid'])){
        header('Location:login.php');
    }
    include_once 'include/dbh.inc.php';
    include_once 'header.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/myads.css?v=<?php echo time(); ?>">
    <title>My Ads</title>
</head>
<body>
<div class="title">
    <h1>My Ads</h1>
</div>
<div class="flex">
    <div class="listing">
        <?php
            $sql="SELECT LEFT(item_title,30),item_price,item_location,created_date,item_image,listingid FROM listing WHERE user_Id=".$_SESSION['userid'];
            
            $result = $conn->query($sql);

            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                ?>
                <div class="box">
                    <div class="image">
                        <img src="uploads/<?php echo $row['item_image']; ?>">
                    </div>
                    <div class="title">
                        <h3><?php echo $row['LEFT(item_title,30)'] ?></h3>
                    </div>
                   <div class="details">
                    <div class="price">
                            <p><i class='fas fa-dollar-sign'></i>&nbsp;<?php echo $row['item_price'] ?><p>    
                        </div>
                        <div class="location">
                            <p><i class="fa fa-map-marker"></i>&nbsp;<?php echo $row['item_location'] ?><p>
                        </div>
                        <div class="created-date">
                            <p>Posted: <?php echo $row['created_date'] ?><p>
                        </div>
                        <div class="button">
                            <button type="button" class="edit" name="edit" onclick="location='edit.listing.php?listingid=<?php echo $row['listingid']; ?>'">Edit</button>
                            <button type="button" class="delete" name="delete" onclick="location='include/delete.listing.php?deleteid=<?php echo $row['listingid']; ?>'">Delete</button>
                        </div>
                   </div>
                </div>
                    <?php
                }
            }
            else {
                ?>
                    <div class="div">
                        No listing Found
                    </div>
                <?php
            }
        ?>
    </div> 
  </div>
</body>
</html>
<?php
include_once 'footer.php';
?>
