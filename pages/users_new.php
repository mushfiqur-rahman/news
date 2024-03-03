<?php
$name = "";
$contact = "";
$email = "";
$password = "";
$type = "";

$ename = "";
$econtact = "";
$eemail = "";
$epassword = "";
$etype = "";

if(isset($_POST['submit']))
{
	$name = $_POST['name'];
	$contact = $_POST['contact'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	if(isset($_POST['type']))
		$type = $_POST['type'];
	
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
	if($type == "")
	{
		$er++;
		$etype = '<span class="error">Required</span>';
	}
	
	if($er == 0)
	{
		
		$sql = "insert into users(name, contact, email, password, createIP, type) 
				values('".ms($name)."', '".ms($contact)."', '".ms($email)."', password('".ms($password)."'), '".$_SERVER['REMOTE_ADDR']."', '".ms($type)."')";
		if(mysqli_query($cn, $sql))
		{
			print '<span class="success">Data Saved</span>';
			$name = "";
			$contact = "";
			$email = "";
			$password = "";
			$type = "";
		}
		else{
			print '<span class="error">'.mysqli_error($cn).'</span>';
		}
	}
}

?>
<form method="post" action="">
    <div class="form-row justify-content-around">
        <div class="col-md-6 mb-5 ">

	<label for="nm">Name</label><br>
	<input type="text" class="form-control" placeholder="Name" name="name" id="nm" value="<?php print $name; ?>"/><?php print $ename; ?><br><br>

	<label for="phn">Contact</label><br><br>
	<input type="text" class="form-control" placeholder="Phone" name="contact" id="phn" value="<?php print $contact; ?>"/><?php print $econtact; ?><br><br>

	<label for="ml">Email</label><br>
	<input type="text" name="email" class="form-control" placeholder="example@mail.com" id="ml" value="<?php print $email; ?>"/><?php print $eemail; ?><br><br>

	<label for="ps">Password</label><br>
	<input type="password" name="password" class="form-control" id="ps" placeholder="password" value=""/><?php print $epassword; ?><br><br>

	<label>Type</label><br><br>
	<input type="radio" name="type" value="A"/> Admin
	<input type="radio" name="type" value="U"/> User <?php print $etype; ?><br><br>

	<input type="submit" class="btn btn-success form-control" name="submit" value="Submit"/>
        </div>
    </div>
	
</form>