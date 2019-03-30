<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>

    <title>Emily's Snake Tracker</title>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
</head>
    
<body>
<nav class="navbar navbar-expand-sm bg-light navbar-light">
     <div class="container">
     <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link"href="index.php">Home</a></li>
      
        <?php
        if (isset($_SESSION['userID'])) {
echo '
    <li class="nav-item"><a class="nav-link"href="meal.php">Meal Recordings</a></li>
      <li class="nav-item"><a class="nav-link"href="shed.php">Shed Recordings</a></li>
      <li class="nav-item"><a class="nav-link"href="weight.php">Weight Recordings</a></li>
   <li class="nav-item"><a class="nav-link"href="data.php">View Data</a></li>
     </ul>
         
<form action=includes/logout.inc.php method="post">
        <button type="submit" name="logout-submit" class="btn btn-outline-primary">Log Out</button>
            </form>';
}

else {
echo '<form action="includes/login.inc.php" method="post" class="form-inline">
        <input type="text"  name="mailuid" placeholder="Username" class="form-control mr-sm-2">
        <input type="password" name="pwd" placeholder="Password" class="form-control mr-sm-2">
        <button type="submit" name="login-submit" class= "btn btn-outline-secondary">Log In</button>&nbsp
        <a href="includes/signup.inc.php" class="btn btn-outline-primary" role="button" aria-pressed="true">Sign Up</a></form>';
}
         ?>
    </div>
         </nav>
      <br><br>
     <div class="container">
