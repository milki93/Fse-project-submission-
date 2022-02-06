<?php
require_once 'config.php';

$user_id = $_SESSION['user_id'];

$SQL = "SELECT fname, sex, blood_type  FROM user WHERE id = ?";

$stmt = $link->prepare($SQL);
//echo var_dump($link->error);
$stmt->bind_param('d', $user_id);
$stmt->execute();
$stmt->bind_result($f_name, $sex, $blood_type);
$stmt->fetch();
if($sex==1){
    $sex="Male";
}
else{
    $sex="Female";
}
$stmt->close();
//echo $f_name.' - '.$sex.' - '.$blood_type;
?>