<?php
$name = "";
$email = "";
$contact = "";
$address = "";
$city = "";

$ename = "";
$eemail = "";
$econtact = "";
$eaddress = "";
$ecity = "";


if(isset($_POST['submit']))
{
	$name = $_POST['name'];
	$email = $_POST['email'];
	$contact = $_POST['contact'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	
	
	$er = 0;
	if($name == "")
	{
		$er++;
		$ename = "<span class=\"error\">Required</span><br>";
	}
	if($contact == "")
	{
		$er++;
		$econtact = "<span class=\"error\">Required</span><br>";
	}
	if($email == "")
	{
		$er++;
		$eemail = "<span class=\"error\">Required</span><br>";
	}
	if($address == "")
	{
		
	}
	else if(strlen($address) < 5)
	{
		$er++;
		$eaddress = "<span class=\"error\">Must contain 5 Character or more</span><br>";
	}
	if($city == "0")
	{
		$er++;
		$ecity = "<span class=\"error\">Required</span><br>";
	}
	
	if($er == 0)
	{
		$cn = mysqli_connect("localhost", "root", "", "dbus_002");
		
		$sql = "INSERT INTO student (name, contact, email, address, cityId) 
		VALUES ('".mysqli_real_escape_string($cn, strip_tags($name))."', '$contact', '$email', '".mysqli_real_escape_string($cn, strip_tags($address))."', $city)";
		
		if(mysqli_query($cn, $sql))
		{
			print "<span class=\"success\">Data Saved</span>";
			$name = "";
			$email = "";
			$contact = "";
			$address = "";
			$city = "";
		}
		else{
			print '<span class="error">'.mysqli_error($cn).'</span>';
		}
	}
	else{
		
	}
	
}
?>
<form method="post" action=""/>
<label>Name</label><br>
<input type="text" name="name" value="<?php print $name; ?>" /><?php print $ename; ?><br><br>
<label>Contact</label><br>
<input type="text" name="contact" value="<?php print $contact; ?>"/><?php print $econtact; ?><br><br>

<label>Email</label><br>
<input type="text" name="email" value="<?php print $email; ?>"/><?php print $eemail; ?><br><br>

<label>Address</label><br>
<textarea name="address"><?php print $address; ?></textarea><?php print $eaddress; ?><br><br>

<label>City</label><br><br>
<select name="city">
	<option value="0">Select</option>
	<?php

	$sql = "select id, name from city";

	$table = mysqli_query($cn, $sql);
	while($row = mysqli_fetch_assoc($table))
	{
		if($city == $row["id"])
		{
			print '<option value="'.$row["id"].'" selected>'.$row["name"].'</option>';
		}
		else{
			print '<option value="'.$row["id"].'">'.$row["name"].'</option>';
		}
	}
	
	?>
</select><?php print $ecity; ?><br><br>


<input type="submit" name="submit" value="Submit" />

</form>


