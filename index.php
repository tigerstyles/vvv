<?php
// Initialize the session
session_start();
?>

<?php include "header.php" ?>
  <?php if(isset($_SESSION['name']) && !empty($_SESSION['name'])) : ?>
    <div id="welcome">
      <p>Welcome <?php echo $_SESSION['name']; ?>!</p>
    </div>
  <?php endif; ?>
  <div id="search" style="">
    <form action="search.php" method="get">
        <div class="form-group">
            <input type="text" name="search" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Search">
        </div>
    </form>
  </div>

<?php include "footer.php" ?>
