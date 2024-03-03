  <script src="../ckeditor/ckeditor.js"></script>


  
<?php
$cn = mysqli_connect("localhost", "root", "", "dbus_002");
$title = "";
$tag = "";
$content = "";
$categoryId = "";

$etitle = "";
$etag = "";
$econtent = "";
$ecategoryId = "";

if(isset($_POST['submit']))
{
	$title = $_POST['title'];
	$tag = $_POST['tag'];
	$content = $_POST['content'];
	$categoryId = $_POST['categoryId'];
	
	$er = 0;
	
	if($title == "")
	{
		$er++;
		$etitle = '<span class="error">Required</span>';
	}
	
	if($tag == "")
	{
		$er++;
		$etag = '<span class="error">Required</span>';
	}
	if($content == "")
	{
		$er++;
		$econtent = '<span class="error">Required</span>';
	}
	if($categoryId == "0")
	{
		$er++;
		$ecategoryId = '<span class="error">Required</span>';
	}
	
	if($er == 0)
	{
		$sql = "insert into pages(title, tags, createDate, userId, hitCount, categoryId) values(
		'".mysqli_real_escape_string($cn, $title)."',
		'".mysqli_real_escape_string($cn, $tag)."',
		'".date("Y-m-d")."',1,0,
		".mysqli_real_escape_string($cn, $categoryId)."
		)";
		
		if(mysqli_query($cn, $sql))
		{
			$file = fopen("articles/".str_replace(" ", "_", trim($title)).".html", "w");
			
			fwrite($file, $content);
			
			
			print '<span class="success">Data Saved</span>';
			$title = "";
			$tag = "";
			$content = "";
			$categoryId = "";
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
	
	<label>Title</label><br>
	<input type="text" class="form-control " name="title" value="<?php print $title; ?>"/><?php print $etitle; ?><br><br>
	
	<label>Tag</label><br>
	<input type="text" class="form-control" name="tag" value="<?php print $tag; ?>"/><?php print $etag; ?><br><br>
	
	<label>Content</label><br>
	<textarea name="content" class="form-control" id="editor"><?php print $content; ?></textarea><?php print $econtent; ?><br><br>
	
	<label>Category</label><br>
	<select name="categoryId " class="form-control">
	<option value="0">Select</option>
	<?php
	$sql = "select id, name from category";
	$table = mysqli_query($cn, $sql);
	while($row = mysqli_fetch_assoc($table))
	{
		if($row["id"] == $categoryId)
		{
			print '<option value="'.$row["id"].'" Selected>'.$row["name"].'</option>';
		}
		else{
			print '<option value="'.$row["id"].'">'.$row["name"].'</option>';
		}
	}
	?>
</select><?php print $ecategoryId; ?><br><br>
	
	
	<input type="submit" class="btn btn-success form-control" name="submit" value="Submit"/>

        </div>
    </div>

</form>
  <script>
      initSample();
  </script>