<?php
session_start();
include_once 'dbh.inc.php';

if(!$conn){
    die("Could not connect to db".mysql_connect_error());
}
if(isset($_GET['deleteid'])){
    $sql = "DELETE FROM listing WHERE listingid =".$_GET['deleteid'];

    if(mysqli_query($conn, $sql)){
        $message ="Ads Succesfully Deleted";

        echo "<script>alert('$message')
                window.location.replace('../myads.php')
              </script>";
    }
    else{
        echo "Error deleting ads".mysqli_error($conn);
    }
}
mysqli_close($conn);
?>
