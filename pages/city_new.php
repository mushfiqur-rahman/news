<?php
$name = "";

$ename = "";

if(isset($_POST['submit']))
{
	$name = $_POST["name"];
	
	$er = 0;
	
	if($name == "")
	{
		$er++;
		$ename = '<span class="error">Required</span>';
	}
	
	if($er == 0)
	{
		$sql = "insert into city(name) values('".mysqli_real_escape_string($cn, $name)."')";
		if(mysqli_query($cn, $sql))
		{
			print "<span class=\"success\">City Inserted</span>";
			$name = "";
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
	
            <labe for="nm">Name</labe><br>
            <input type="text" name="name" class="form-control" id="nm" value="<?php print $name; ?>"/><?php print $ename; ?><br><br>

            <input type="submit" class="btn btn-success form-control " name="submit" value="Submit"/>
        </div>
    </div>
</form>