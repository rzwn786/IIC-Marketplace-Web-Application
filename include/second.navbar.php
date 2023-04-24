<?php
include_once 'dbh.inc.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/second.navbar.css?v=<?php echo time(); ?>">
</head>
<body>
<div class="navbar">
      <a class="active" href="#all">ALL CATEGORIES</a>
      <a href="#vehicle">VEHICLES</a>
      <a href="#electronic">ELECTRONICS</a>
      <a href="#personal">HOME & PERSONAL ITEMS</a>
      <a href="#hobbies">LEISURE/SPORTS/HOBBIES</a>
      <a href="#jobs">JOBS & SERVICES</a>
      <div class="search-container">
          <form action="./find.php" method="get">
              <input type="text" name="search" placeholder="What are you looking for" value="<?php if(isset($_GET["search"])){echo $_GET["search"]; } ?>" required>
              <button type="submit">Find</button>
          </form>
      </div>
    </div>
  </div>
</body>
</html>