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
    <link rel="stylesheet" href="./style/main.navbar.css?v=<?php echo time(); ?>">
</head>
<body>
<div class="search-bar">
    <div class="form">
        <form action="./find.php" method="get">
            <div class="input-group">
                <select>
                    <option value="">ALL CATEGORIES</option>
                    <option value="">VEHICLES</option>
                    <option value="">ELECTRONICS</option>
                    <option value="">HOME & PERSONAL ITEMS</option>
                    <option value="">LEISURE/SPORTS/HOBBIES</option>
                    <option value="">JOBS & SERVICES</option>
                </select>
                <input type="text" name="search" placeholder="What are you looking for" value="<?php if(isset($_GET["search"])){echo $_GET["search"]; } ?>" required>
                <button type="submit" class="btn" for="mainsearch" name="searchbtn"><i class="fa fa-search" aria-hidden="true"></i>&nbsp;Search</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>