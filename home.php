<?php
session_start();
include_once 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style/home.css?v=<?php echo time(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="script/home.js" defer></script>
    <title>Home Page</title>
</head>
<body>
<?php
include_once 'include/main.navbar.php'
?>
   <div class="content">
      <div class="section">
         <div class="tah">
            <h1>Sell Faster & Find Great Deals</h1>
            <div class="group-btn">
               <button type="button" class="findbtn" name="findbtn" onclick="window.location.href='find.php'">Find</button>
               <button type="button" class="sellbtn" onclick="window.location.href='sell.php'">Sell</button>        
            </div>
         </div>
         <div class="slideshow-container">
            <div class="mySlides fade">
               <img class="image" src="img/iphone.png" >
            </div>
            <div class="mySlides fade">
               <img class="image" src="img/woman1.png">
            </div>

            <div class="mySlides fade">
               <img class="image" src="img/casio.jpg" >
            </div>
            <div class="dot-container">
               <span class="dot"></span> 
               <span class="dot"></span> 
               <span class="dot"></span> 
            </div>
         </div>
      </div>
      <div class="categories-button">
         <div class="label">
            <h4>Popular Search</h4>
            <p>From Cars to Cameras, Properties to Pets, Mobile phones to Motorcycles, Treadmills to Textbooks, Watches to Washing machines, Jobs and many more...</p>
         </div>
         <div class="button">
            <div class="btn-cat">
               <button type="button"><img src="img/icon/car.png"></button>
               <p>Car</p>
            </div>
            <div class="btn-cat">
               <button type="button"><img src="img/icon/hobby.png"></button>
               <p>Hobbies</p>
            </div>
            <div class="btn-cat">
               <button type="button"><img src="img/icon/property.png"></button>
               <p>Properties</p>
            </div>
            <div class="btn-cat">
               <button type="button"><img src="img/icon/job.png"></button>
               <p>Job</p>
            </div>
            <div class="btn-cat">
               <button type="button"><img src="img/icon/women item.png"></button>
               <p>Women Item</p>
            </div>
            <div class="btn-cat">
               <button type="button"><img src="img/icon/service.png"></button>
               
               <p>Servies</p>
            </div>
            <div class="btn-cat">
               <button type="button"><img src="img/icon/phone.png"></button>
               <p>Electronics</p>
            </div>
            <div class="btn-cat">
               <button type="button"><img src="img/icon/pet.png"></button>
               <p>Pets</p>
            </div>
            <div class="btn-cat">
               <button type="button"><img src="img/icon/games.png"></button>
               <p>Games</p>
            </div>
         </div>
      </div>
      <div class="seller-promo">
         <div class="image">
            <img src="img/bobs.jpg">
            <h3>Become Seller and generate income now</h3>
            <button>Start Selling Now</button>
         </div>
      </div>
      <div class="mobile-apps-container">
            <div class="image">
               <img src="img/mobile.png">
            </div>
      </div>
   </div>
</body>
</html>
<?php 
include_once 'footer.php';
?>