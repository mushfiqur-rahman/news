<?php

$page = "";
$title = "";
$image = array();

$epage = "";
$etitle = "";
$eimage = "";

if(isset($_POST['submit']))
{
	$page = $_POST['page'];
	$title = $_POST['title'];
	$image = $_FILES['image'];
	
	$er = 0;
	if($page == "0")
	{
		$er++;
		$epage = '<span class="error">Required</span>';
	}
	
	if($title == "")
	{
		$er++;
		$etitle = '<span class="error">Required</span>';
	}
	
	if($image['name'] == "")
	{
		$er++;
		$eimage = '<span class="error">Required</span>';
	}
	else if($image['size'] > (2 * 1024 * 1024))
	{
		$er++;
		$eimage = '<span class="error">File Must Less Than 2 MB</span>';
	}
	else{
		$a = explode(".", $image['name']);
		if(is_array($a) && count($a) > 1)
		{
			$ext = strtolower($a[count($a)-1]);
			if(!($ext == "jpg" || $ext == "png" || $ext == "gif"))
			{
				$er++;
				$eimage = '<span class="error">Only JPG, GIF, PNG Supported</span>';
			}
		}
		else{
			$er++;
			$eimage = '<span class="error"> . Nai Kere</span>';
		}
	}
	
	if($er == 0)
	{
		$sql = "insert into pageImage(pageId, title, image) values( ".ms($page).", '".ms($title)."', '".ms($image['name'])."')";
		if(mysqli_query($cn, $sql))
		{
			$sp = $image['tmp_name'];
			$dp = "uploads/images/".mysqli_insert_id($cn)."_".$image['name'];
			move_uploaded_file($sp, $dp);
			
			print '<span class="success">Image Saved</span>';
			$page = "";
			$title = "";
			$image = array();
		}
		else{
			print '<span class="error">'.mysqli_error($cn).'</span>';
		}
	}
	
}

?>
<form method="post" action="" enctype="multipart/form-data">
    <div class="form-row justify-content-around">
        <div class="col-md-6 mb-5 ">

	<label>Page</label><br>
	<select name="page" class="form-control form-control-lg">
		<option value="0">Select</option>
		<?php

		$sql = "select id, title from pages";

		$table = mysqli_query($cn, $sql);
		while($row = mysqli_fetch_assoc($table))
		{
			if($page == $row["id"])
			{
				print '<option value="'.$row["id"].'" selected>'.$row["title"].'</option>';
			}
			else{
				print '<option value="'.$row["id"].'">'.$row["title"].'</option>';
			}
		}

		?>
	</select><?php print $epage; ?><br><br>

	<label>Title</label><br>
	<input type="text" class="form-control" name="title" value="<?php print $title; ?>"/><?php print $etitle; ?><br><br>

	<label>Image</label><br>
	<input type="file" class="form-control" name="image" /><?php print $eimage; ?><br><br>

	
	<input type="submit" class="form-control btn btn-success" name="submit" value="Submit"/>

        </div>
    </div>
</form>