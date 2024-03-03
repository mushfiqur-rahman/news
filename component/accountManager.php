<?php

unset($_SESSION['active']);

if(!isset($_SESSION['type']) and isset($_COOKIE['type']))
{
	//$_SESSION['id'] = $_COOKIE["id"];
	//$_SESSION['name'] = $_COOKIE["name"];
	//$_SESSION['email'] = $_COOKIE["email"];
	//$_SESSION['type'] = $_COOKIE["type"];
}


$email = "";
$password = "";
$eemail = "";
$epassword = "";

if(isset($_POST['btnLogin']))
{
	$email = $_POST['email'];
	$password  = $_POST['password'];
	
	$er = 0;
	
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
	
	if($er == 0)
	{
		$sql = "select id, name, email, type from users where email = '".$email."' and password = password('".$password."')";
	
		$table = mysqli_query($cn, $sql);
		if(mysqli_num_rows($table) > 0)
		{
			while($row = mysqli_fetch_assoc($table))
			{
				$sql = "select ip, dateTime from usersActive where userId = ".$row["id"];
				$table2 = mysqli_query($cn, $sql);
				if(mysqli_num_rows($table2) > 0)
				{
					$_SESSION['id'] = $row["id"];
					$_SESSION['name'] = $row["name"];
					$_SESSION['email'] = $row["email"];
					$_SESSION['type'] = $row["type"];
					
					if(isset($_POST['remember']))
					{
						//setcookie("id", $row["id"], 30*24*60*60);	
					}
				}
				else{
					$_SESSION['active'] = 1;
				}
			}
		}
	}
}

if(isset($_GET['c']) and $_GET['c'] == "logout")
{
	unset($_SESSION['id']);
	unset($_SESSION['name']);
	unset($_SESSION['email']);
	unset($_SESSION['type']);
}
?>