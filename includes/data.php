<?php
include_once 'includes/dbh.php';


$querymalegender = mysqli_query($conn, "SELECT COUNT(user_gender) FROM users WHERE user_gender = 'Male'");
$queryfemalegender = mysqli_query($conn,"SELECT COUNT(user_gender) ' FROM users WHERE user_gender = 'Female'");

$malecount = mysqli_fetch_assoc($querymalegender);
$femalecount = mysqli_fetch_assoc($queryfemalegender);;

$result = array('Male'=> $malecount, 'Female'  => $femalecount);

print json_encode($result);
echo json_encode($result);

mysqli_close($conn);
?>
