<?php

include 'include/dbh.inc.php';
$location = $_POST['location'];
$date = $_POST['date'];
echo "<br>";
echo "$date"."  "."$location"."<br>";
$sql = "INSERT INTO `appoint`(`donor_id`,`location`,  `date`) VALUES ('1','$location','$date')";
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
