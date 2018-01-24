<?php

session_start();

if(isset($_POST['login'])){
	include 'dbh.php';
	
	$username = mysqli_real_escape_string($conn,$_POST['usernamelogin']);
	$password = mysqli_real_escape_string($conn,$_POST['pwdlogin']);
	
	$sql = "SELECT * FROM users WHERE user_username ='$username'";
	$result = mysqli_query($conn,$sql);
	$resultCheck = mysqli_num_rows($result);
	if($resultCheck <1 )
	{
		exit();
	}
	else
	{
		if($row = mysqli_fetch_assoc($result)){
			
			$hashedPwdCheck = password_verify($password,$row['user_password']);
			if ($hashedPwdCheck == false)
			{
				exit();
			}
			else if ($hashedPwdCheck == true)
			{
				$_SESSION['u_username'] = $row['user_username'];
				$_SESSION['u_name'] = $row['user_name'];
				$_SESSION['u_pwd'] = $row['user_password'];
				$_SESSION['u_gender'] = $row['user_gender'];
				$_SESSION['u_age'] = $row['user_age'];
				echo '<script language="javascript">';
				echo 'alert("LOGIN")';
				echo '</script>';
				header("Location: ../site.php?signup=success");
				exit();
			}
		}
	}
}