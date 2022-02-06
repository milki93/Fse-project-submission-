<?php
require_once 'config.php';

if (isset($_SESSION['user_id']))
{
    header('Location: index.php');
}

$login_error = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $email = $link->real_escape_string($_POST['email']);
    $password = $link->real_escape_string($_POST['password']);

    $SQL = "SELECT id, password, role FROM user WHERE email = ?";
    if ($stmt = $link->prepare($SQL)){
        $stmt->bind_param("s", $email_param);
        $email_param = $email;
        if($stmt->execute()){
            $stmt->bind_result($id, $hashed_password, $role);
            if ($stmt->fetch())
            {
                if (password_verify($password, $hashed_password))
                {
                    $_SESSION['user_id'] = $id;
                    if ($role == 1)
                    {
                        header('Location: staff.php');
                        exit();
                    }
                    header("Location: donor.php");
                } else {
                    $login_error = "LOGIN INVALID";
                }
            } else {
                $login_error = "LOGIN INVALID";
            }
        } else {
            $login_error = "LOGIN INVALID";
        }
    } else {
        $login_error = "LOGIN INVALID";
    }

}
$link->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/styles.css" rel="stylesheet">
    <title>Blood Bank</title>
</head>
<body>
    <form class="login-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div>
            <div class="login-header">
                Login
            </div>
            <div class="login-body">
                <fieldset>
                    <legend>Email</legend>
                    <input type="email" name='email' placeholder="Your email" require/>
                </fieldset>
                <fieldset>
                    <legend>Password</legend>
                    <input type="password" name='password' placeholder="Your password" require/>
                </fieldset>
                <div class="err-msg"><?php echo $login_error; ?></div>
                <div>
                    <button type="submit" class="login-button">Login</button>
                </div>
            </div>
            <div class="login-footer">
                <a href="#">Forget password?</a><br>
                <a href="sign_up.php">New here click to sign_up</a>
            </div>
        </div>
    </form>
</body>
</html>