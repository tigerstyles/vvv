<?php
// db conn
require_once 'inc/db.php';
// init vars
$name = $password = $confirm_password = $email = "";
$name_err = $password_err = $confirm_password_err = $email_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

  // Validate email
  if(empty(trim($_POST["email"]))){
      $email_err = "Please enter a email.";
  } else{
      // Prepare a select statement
      $sql = "SELECT id FROM users WHERE email = :email";

      if($stmt = $pdo->prepare($sql)){
          // Bind variables to the prepared statement as parameters
          $stmt->bindParam(':email', $param_email, PDO::PARAM_STR);

          // Set parameters
          $param_email = trim($_POST["email"]);

          // Attempt to execute the prepared statement
          if($stmt->execute()){
              if($stmt->rowCount() == 1){
                  $emauil_err = "This email is already taken.";
              } else{
                  $email = trim($_POST["email"]);
              }
          } else{
              echo "Oops! Something went wrong. Please try again later.";
          }
      }

      // Close statement
      unset($stmt);
  }
    // Validate name
    if(empty(trim($_POST["name"]))){
        $name_err = "Please enter a name.";
    } else{
        $name = trim($_POST["name"]);
    }

    // Validate password
    if(empty(trim($_POST['password']))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST['password'])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST['password']);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = 'Please confirm password.';
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password){
            $confirm_password_err = 'Password did not match.';
        }
    }

    // Check input errors before inserting in database
    if(empty($name_err) && empty($password_err) && empty($confirm_password_err && empty($email_err))){

        // Prepare an insert statement
        $sql = "INSERT INTO users (name, password, email) VALUES (:name, :password, :email)";

        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(':email', $param_email, PDO::PARAM_STR);
            $stmt->bindParam(':name', $param_name, PDO::PARAM_STR);
            $stmt->bindParam(':password', $param_password, PDO::PARAM_STR);


            // Set parameters
            $param_email = $email;
            $param_name = $name;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement
        unset($stmt);
    }

    // Close connection
    unset($pdo);
}
?>
