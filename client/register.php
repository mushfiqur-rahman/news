<?php
$name = "";
$contact = "";
$email = "";
$password = "";
$passwordReType = "";

$ename = "";
$econtact = "";
$eemail = "";
$epassword = "";
$epasswordReType = "";

if(isset($_POST['submit']))
{
	$name = $_POST['name'];
	$contact = $_POST['contact'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$passwordReType = $_POST['passwordReType'];
	
	$er = 0;
	
	if($name == "")
	{
		$er++;
		$ename = '<span class="error">Required</span>';
	}
	
	if($contact == "")
	{
		$er++;
		$econtact = '<span class="error">Required</span>';
	}
	if($email == "")
	{
		$er++;
		$eemail = '<span class="error">Required</span>';
	}
	if($password == "")
	{
		$er++;
		$epassword = '<span class="error">Required</span>';
	}
	
	if($passwordReType == "")
	{
		$er++;
		$epasswordReType = '<span class="error">Required</span>';
	}
	else if($password != $passwordReType)
	{
		$er++;
		$epasswordReType = '<span class="error">Password missmatch</span>';
	}
	
	if($er == 0)
	{
		
		$sql = "insert into users(name, contact, email, password, createIP, type) 
				values('".ms($name)."', '".ms($contact)."', '".ms($email)."', password('".ms($password)."'), '".$_SERVER['REMOTE_ADDR']."', 'U')";
		if(mysqli_query($cn, $sql))
		{
			print '<span class="success">Registration was completed successfully</span>';
			
			$message = "Dear ".$name."\n<br>";
			$message .= "Your have recently register to our system. Please click the following link to activate your account.\n<br>";
			
			$message .= '<a href="http://localhost/US_02/?c=activate&id='.mysqli_insert_id($cn).'">Activate My Account</a>'."\n<br>";
			
			$message .= 'If you have not register the click the following link'."\n<br>";
			
			$message .= '<a href="http://localhost/US_02/?c=deactivate&id='.mysqli_insert_id($cn).'">Deactivate My Account</a>'."\n<br>";
			
			print $message;
			
			//mail($email, "account activation for diuuuuuu.com", $message);
			
		}
		else{
			print '<span class="error">'.mysqli_error($cn).'</span>';
			include('client/registrationForm.php');
		}
	}
}
else{
	include('client/registrationForm.php');
}

?>