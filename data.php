<?php
include_once 'includes/dbh.php';


$querymalegender = mysqli_query($conn, "SELECT user_gender,COUNT(*) AS 'num' FROM users");
$queryfemalegender = mysqli_query($conn,"SELECT COUNT(user_gender) AS 'Female' FROM users WHERE user_gender = 'Female'");

$malecount = mysqli_fetch_assoc($querymalegender);
$femalecount = mysqli_fetch_assoc($queryfemalegender);;

$result = array($malecount);

print json_encode($result);

mysqli_close($conn);
?>
