<?php
session_start();
include_once 'dbh.inc.php';
if(isset($_POST['submit'])){



    $title=$_POST['title'];
    $price=$_POST['price'];
    $catogeries=$_POST['catogeries'];
    $condition=$_POST['conditions'];
    $description=$_POST['description'];;
    $location=$_POST['location'];
    $cod=$_POST['cod'];
    $postage=$_POST['pos'];

    $sql ="INSERT INTO listing (item_title,item_price,item_catogeries,item_condition,item_description,item_location,item_cod,item_postage,created_date)
    VALUES('$title','$price','$catogeries','$condition','$description','$location','$cod','$postage')";

    if(mysqli_query($conn,$sql)){
        $message ="Item Succesfully Added";

        echo "<script>alert('$message')
                window.location.replace('home.php')
              </script>";
    }
    else{
        echo '<script>alert("Failed to add item")</script>';
        echo "<h1>Error: </h1>" . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);


}
?>