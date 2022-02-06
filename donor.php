<?php
require_once 'config.php';

if (!isset($_SESSION['user_id']))
{
    header('Location: login.php');
}
require_once 'profile.php';
 $user_id = $_SESSION['user_id'];
require_once 'prochange.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
 
    $location =$_POST['location'];
    $date=$_POST['date'];
   
   
    $sql="INSERT INTO `appoint`(`id`, `location`, `daychosen`) VALUES (?,?,?)";
  if( $stmt = $link->prepare($sql)){
       if( $stmt->bind_param("dss",$user_id, $location,$date)){
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
    <title>donor page</title>
    <link href="css/donor.style.css" rel="stylesheet">
</head>

<body>
 

    <h1 class="header">welcome </h1>
    <h3 class="header">your status</h3>

    <p>hello there</p>
    <?php
    echo "full name: " . $f_name ."<br>" . "sex: " . $sex . "<br>" ."blood type: " . $blood_type .
    "<br>"."Mass(Kg): ".$mass."<br>"."Bloodpressure: ".$bloodpressure."<br>"."Sugar: ".$sugar;    
    ?>


    <h4 class="header">Set Appointment</h4>
    
    <form class="login-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <div class="content_body">
        
        <legend class=location>Location</legend>
        <select name="location"  class="option">
            <option value="adama_posta">adama city, posta</option>
            <option value="adama_o4">adama city,o4</option>
            <option value="adama_mebrathaiel">adama city,mebrat haiel</option>
        </select><br>
        
        <div>
            <legend class="location">Date</legend>
            <input type="date" name="date" class="option">
        </div>
        <div>
            <button type="submit" class="button">Submit</button>
        </div>
    </div>
    </form>
</body>
</html>