<?php

if(isset($_GET['id']))
{
	$sql = "insert into usersActive(userId, ip) values(".ms($_GET['id']).", '".$_SERVER['REMOTE_ADDR']."')";
	if(mysqli_query($cn, $sql))
	{
		print "Your account have been activated, you can login now.";
	}
	else{
		print "You are activated already";
	}
}


?>