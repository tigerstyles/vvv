<?php
  require_once 'inc/register.inc.php';
?>

<?php include "header.php" ?>
  <?php if(isset($_SESSION['name']) && !empty($_SESSION['name'])) : ?>
    <div id="welcome">
      <p>Welcome <?php echo $_SESSION['name']; ?>!</p>
    </div>
  <?php endif; ?>
<div class="wrapper">
  <h2>Sign Up</h2>
    <p>Please fill this form to create an account.</p>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
          <label>Email</label>
          <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
          <span class="help-block"><?php echo $email_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
          <label>Name</label>
          <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
          <span class="help-block"><?php echo $name_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
          <label>Password</label>
          <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
          <span class="help-block"><?php echo $password_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
          <label>Confirm Password</label>
          <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
          <span class="help-block"><?php echo $confirm_password_err; ?></span>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Submit">
            <input type="reset" class="btn btn-default" value="Reset">
        </div>
        <p>Already have an account? <a href="login.php">Login here</a>.</p>
      </form>
</div>

<?php include "footer.php" ?>
