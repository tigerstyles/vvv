<?php
//If session variable is not set it will redirect to login page
if(!isset($_SESSION['name']) || empty($_SESSION['name'])){
  header("location: login.php");
  exit;
}

require_once 'db.php';

$results = $search_err = "";

if($_SERVER["REQUEST_METHOD"] == "GET"){

  // Validate search
  if(empty(trim($_GET["search"]))){
      $search_err = "Please enter a search term.";
  } else{
      // Prepare a select statement
      $sql = "SELECT * FROM users WHERE email LIKE :search OR name LIKE :search";

      if($stmt = $pdo->prepare($sql)){
        $param_search = trim($_GET["search"]);

        $param_search = "%$param_search%";

        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(':search', $param_search, PDO::PARAM_STR);
        // Set parameters

        // Attempt to execute the prepared statement
        $stmt->execute();
        $results = $stmt->fetchAll();

      }

      // Close statement
      unset($stmt);
  }
}
