<?php

if(isset($_POST['signup'])) {
	
	include_once 'dbh.php';
	
	$username = mysqli_real_escape_string($conn,$_POST['usernameregister']);
	$password = mysqli_real_escape_string($conn,$_POST['pwdregister']);
	$name = mysqli_real_escape_string($conn,$_POST['name']);
	$gender = mysqli_real_escape_string($conn,$_POST['gender']);
	$age = $_POST['age'];
	$contact = mysqli_real_escape_string($conn,$_POST['contact']);
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$address = mysqli_real_escape_string($conn,$_POST['address']);
	$industry = mysqli_real_escape_string($conn,$_POST['industry']);
	$findout = mysqli_real_escape_string($conn,$_POST['findout']);
	
	//Error handlers
	//Check for empty fields
	$sql = "SELECT * FROM users WHERE user_name = 'username'";
	$result = mysqli_query($conn,$sql);
	$resultcheck = mysqli_num_rows($result);
	
	if($resultcheck > 0) {
		header ("Location: ../site.php?site=usertaken");
		exit();
	}
	else
	{
		//hash password
		$hashedPwd = password_hash($password,PASSWORD_DEFAULT);
		//insert user into database
		$sql = "INSERT INTO users (user_username,user_password,user_name,user_gender,user_age
				,user_contact,user_email,user_address,user_industry,user_findout,user_admin)
				VALUES ('$username','$hashedPwd','$name','$gender','$age','$contact','$email'
				,'$address','$industry','$findout','0');";
		mysqli_query($conn,$sql);
		header("Location: ../site.php?signup=success");
		exit();
	}
}
else
{
	exit();
}