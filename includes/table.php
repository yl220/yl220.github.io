<?php
include_once 'dbh.php';


if(isset($_POST['search']))
{
	$searchvalue = $_POST['searchvalue'];
	$query = "SELECT * FROM `users` WHERE CONCAT(`user_id`, `user_username`, `user_password`, `user_name`, `user_gender`, `user_age`, `user_contact`, `user_email`, `user_address`, `user_industry`, `user_findout`, `user_admin`) LIKE '%".$searchvalue."%'";
	$result = mysqli_query($conn,$query);
}
else
{
	$query = "SELECT * FROM `users`";
	$result = mysqli_query($conn,$query);
}