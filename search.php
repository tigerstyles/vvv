<?php
// Initialize the session
session_start();
require_once "inc/search.inc.php";
?>
<?php include "header.php" ?>

<?php if(isset($_SESSION['name']) && !empty($_SESSION['name'])) : ?>
  <div id="welcome">
    <p>Welcome <?php echo $_SESSION['name']; ?>!</p>
  </div>
<?php endif; ?>
<span class="help-block"><?php echo $search_err; ?></span>

<div id="search">
  <form action="search.php" method="get">
    <div class="form-group">
      <input type="text" name="search" class="form-control">
    </div>
    <div class="form-group">
      <input type="submit" class="btn btn-primary" value="Search">
    </div>
  </form>
</div>
<div id="searchtable">
  <table id="table" class="table">
    <thead>
      <tr>
        <th>Email</td>
        <th>Name</td>
      </tr>
    </thead>
    <tbody>
<?php if($results !== "") :
  foreach($results as $result) {
    echo '
      <tr>
        <td>'.$result['email'].'</td>
        <td>'.$result['name'].'</td>
        </tr>
      ';
  }
  endif; ?>
    </tbody>
  </table>
</div>

<?php include "footer.php" ?>
