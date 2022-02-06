<?php
require_once 'config.php';

$user_id = $_SESSION['user_id'];
$SQL = "SELECT `mass`, `bloodpressure`, `sugar`FROM `donorhis`  WHERE id = ? order by date_time desc limit 1";
$stmt = $link->prepare($SQL);
echo var_dump($link->error);
$stmt->bind_param('d', $user_id);
$stmt->execute();
$stmt->bind_result($mass, $bloodpressure, $sugar);
if($stmt->fetch()){
    echo "i am working";
}
else{
    echo "sorry";
}
echo $mass.' - '.$bloodpressure.' - '.$sugar;
$stmt->close();
?>