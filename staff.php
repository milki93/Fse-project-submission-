<?php
require_once 'config.php';

if (!isset($_SESSION['user_id']))
{
    header('Location: login.php');
}
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
 
    $mass =$_POST['mass'];
    $bloodpressure=$_POST['pressure'];
    $sugar =$_POST['sugar'];
    $id =$_POST['id'];
    $sql="INSERT INTO `donorhis`(`mass`, `bloodpressure`, `sugar`, `id`) VALUES (?,?,?,?)";
  if( $stmt = $link->prepare($sql)){
       if( $stmt->bind_param("dssd",$mass, $bloodpressure,$sugar,$id)){
           $stmt->execute();
           if( $stmt->affected_rows == 1){
              echo "success";
           }
           else {
               
               echo $link->error;
           }
           $stmt->close();
       }
           else{
               echo "problem with binding";
           }
   }
  else{
      echo $link->error;
  }
}



?>
<!DOCTYPE html>
<html>
    <head>
        <title>staff page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/staff_style.css">
    </head>
    <body>
        <div class="jumbotron">
            <h1 class="heading"> welcome</h1>
            <h2 class="paragraph"> Update Donor Status</h2>
            
        <form class="staff_body" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        
            <div class="items">
                <fieldset>
                    <legend>Donor Id</legend>
                    <input type="name" name="id"require/>
                </fieldset>
                <fieldset>
                    <legend>Mass</legend>
                    <input type="text" name="mass" require/>
                </fieldset>
                <fieldset>
                    <legend>Blood Pressure</legend>
                    <input type="text" name="pressure" require/>
                </fieldset>
                <fieldset>
                    <legend>Sugar level</legend>
                    <input type="text" name='sugar'  require/>
                </fieldset>
                <div>
                    <button type="submit" class="update_button">Update</button>
                </div>
            </div>
            <div class="staff-footer">
                <a href="logout.php">Logout</a>
            </div>
        
        </form>
    </body>
</html>