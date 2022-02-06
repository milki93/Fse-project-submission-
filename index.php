<?php
require_once 'config.php';
?>

<h1>Welcome</h1>

<?php  if (!isset($_SESSION['user_id'])){ ?>
    <a href="login.php" >Login</a>
<?php } else { ?>
    <a href="logout.php" >Logout</a> 
<?php } ?>