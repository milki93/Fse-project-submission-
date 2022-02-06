<?php

    include 'config.php';


    
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name =$_POST['name'];
    $email=$_POST['email'];
    $password1=$_POST['password'];
    $password=password_hash($password1,PASSWORD_DEFAULT);
    $dob=$_POST['dob'];
    $sex=$_POST['gender'];
    $bloodtype=$_POST['bloodtype']; 
    $sql="INSERT INTO `user`(  `fname`, `email`, `password`,  `dob` ,`sex`, `blood_type`)
     VALUES (?, ?, ?, ?, ?, ?)";
   if( $stmt = $link->prepare($sql)){
        if( $stmt->bind_param("ssssss", $name,$email,$password,$dob,$sex,$bloodtype)){
            $stmt->execute();
            if( $stmt->affected_rows == 1){
                header("Location: login.php");
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
       echo "problem with llink";
   }
 
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/sign_up.css">
</head>
<body>
    <form class="sign_up-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div>
            <div class="sign_up-header">
                Sign_up
            </div>
            <div class="sign_up-body">
            <fieldset>
                    <legend>Name</legend>
                    <input type="name" name='name' placeholder="Your Name" require/>
                </fieldset>
                <fieldset>
                    <legend>Email</legend>
                    <input type="email" name='email' placeholder="Your email" require/>
                </fieldset>
                <fieldset>
                    <legend>Password</legend>
                    <input type="password" name='password' placeholder="Your password" require/>
                </fieldset>
                <fieldset>
                    <legend>birth date</legend>
                    <input type="datetime" name='dob' placeholder="yyyy/mm/dd" require/>
                </fieldset>
                <div>
                    <select name="gender" class="gender">
                        <option value="1">Male</option>
                        <option value="0">Female</option>
                    </select>
                    <select name="bloodtype" class="gender" placeholder="Select your blood type">
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                    </select>
                </div>
                <div>
                    <button type="submit" class="sign-up-button">Register</button>
                </div>
            </div>
            <div class="sign-up-footer">
                <a href="login.php">Alread have an account</a>
            </div>
        </div>
    </form>

</body>

</html>