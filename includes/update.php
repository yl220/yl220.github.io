<?php
if(isset($_POST['update'])) {
	
	include_once 'dbh.php';
	$rowid = $_POST['editid'];
	$username = mysqli_real_escape_string($conn,$_POST['editusername']);
	$name = mysqli_real_escape_string($conn,$_POST['editname']);
	$gender = mysqli_real_escape_string($conn,$_POST['editgender']);
	$age = $_POST['editage'];
	$contact = mysqli_real_escape_string($conn,$_POST['editcontact']);
	$email = mysqli_real_escape_string($conn,$_POST['editemail']);
	$address = mysqli_real_escape_string($conn,$_POST['editaddress']);
	
	
		$sql = "UPDATE users SET user_username='$username',user_name='$name',
		user_gender='$gender',user_age='$age',user_contact ='$contact'
		,user_email='$email',user_address='$address' WHERE user_id='$rowid' ";
		mysqli_query($conn,$sql);
		header("Location: ../site.php?update=success");
		//echo $rowid,$name,$username,$gender,$age,$contact,$email,$address;
		echo"
				<script type='text/javascript'>
				$(document).ready(function () {
						$('html,body').animate({
							scrollTop: $('.graph').offset().top
						},
							'slow');
					})
				</script>";
		exit();
}
else
{
	exit();
}
?>