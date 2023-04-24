<?php
session_start();
include_once 'header.php';
include_once 'include/dbh.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style/find.css?v=<?php echo time(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Page</title>
</head>
<body>
    <?php
    include_once 'include/second.navbar.php';
    ?>
  <div class="flex">
    <div class="listing">
        <?php
            if(isset($_GET['search'])){
                $filtervalues = $_GET["search"];
                $sql = "SELECT * FROM listing WHERE CONCAT(item_title,item_description) LIKE '%$filtervalues%' ";
                $result = mysqli_query($conn,$sql);
                
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                    ?>
                    <div class="box">
                        <div class="image">
                            <a href="listing.php?listingid=<?php echo $row['listingid']; ?>"><img src="uploads/<?php echo $row['item_image']; ?>"></a>
                        </div>
                        <div class="title">
                            <a href="listing.php?listingid=<?php echo $row['listingid']; ?>"><h3><?php echo $row['item_title'] ?></h3></a>
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
           }
           else{
            $sql = "SELECT l.item_title,LEFT(l.item_title,30),u.firstName,u.lastName,l.item_price,l.item_location,l.created_date,l.item_image,l.listingid FROM users
            AS u INNER JOIN listing AS l ON (u.usersId = l.user_Id) ORDER BY listingid DESC";
            
            
            $result = $conn->query($sql);

            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                ?>
                <div class="box">
                    <div class="image">
                        <a href="listing.php?listingid=<?php echo $row['listingid']; ?>"><img src="uploads/<?php echo $row['item_image']; ?>"></a>
                    </div>
                    <div class="title">
                        <a href="listing.php?listingid=<?php echo $row['listingid']; ?>"><h3><?php echo $row['LEFT(l.item_title,30)'] ?></h3></a>
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
       }
        ?>
    </div> 
  </div>
</body>
</html>

<?php 
include_once 'footer.php';
?>