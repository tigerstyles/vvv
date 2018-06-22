<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div id="header" style="">
    <a href="/login.php">Login</a>
    <a href="/register.php">Register</a>
<?php    if(isset($_SESSION['name']) || !empty($_SESSION['name'])) : ?>

    <a href="/logout.php">Logout</a>
  <?php endif;?>
  </div>
