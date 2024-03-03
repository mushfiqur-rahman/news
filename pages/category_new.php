<?php
$cn = mysqli_connect("localhost", "root", "", "dbus_002");

$name = "";
$description = "";
$category = "";

$ename = "";



if(isset($_POST['submit']))
{
	$name = $_POST['name'];
	$description = $_POST['description'];
	$category = $_POST['category'];
	
	$er = 0;
	
	if($name == "")
	{
		$er++;
		$ename = "<span class=\"error\">Required</span>";
	}
	
	if($er == 0)
	{
		$sql = "insert into category (name, description, categoryId) values(
		'".mysqli_real_escape_string($cn, strip_tags($name))."', 
		'".mysqli_real_escape_string($cn, strip_tags($description))."', ".mysqli_real_escape_string($cn, strip_tags($category)).")";
		
		if(mysqli_query($cn, $sql))
		{
			print '<span class="success">Category Inserted</span>';
			$name = "";
			$description = "";
			$category = "";
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

            <label for="ds">Description</label><br>
            <textarea name="description" class="form-control" id="ds"><?php print $description; ?></textarea><br><br>

            <label>Category</label><br>
            <select name="category" class="form-control form-control-lg">
                <option value="0">Select</option>
                <?php
                $sql = "select id, name from category";
                $table = mysqli_query($cn, $sql);
                while($row = mysqli_fetch_assoc($table))
                {
                    print '<option value="'.$row["id"].'">'.$row["name"].'</option>';
                }
                ?>
            </select><br><br>

            <input type="submit" class="btn btn-success form-control " name="submit" value="Submit"/>
        </div>
    </div>

</form>