<div class="container-fluid">
    <div class="container">
        <div class="row text-justify">
            <div class="col-lg-8">


<?php
$cn = mysqli_connect("localhost", "root", "", "dbus_002");

$sql = "select p.id, p.title, p.tags, p.createDate, p.userId, p.hitCount, c.name as category
from pages p
		left join category as c on p.categoryId = c.id where p.id = ".$_GET['article'];
$table = mysqli_query($cn, $sql);

print '<div class="summery"> Total '.mysqli_num_rows($table).' Article Found in This Category</div><hr><br>';

while($row = mysqli_fetch_assoc($table))
{
	print '<div class="article">';
	print '<h1>'.$row["title"].'</h1>';
	print '<h3>'.$row["tags"].'</h3>';
	print '<h2> Created on : '.$row["createDate"].', By : ';
	print $row["userId"].', in : '.$row["category"].' Page Hit : '.$row["hitCount"].'</h2>';
	
	print '<div class="images">';
	findImages($row['id']);
	print '</div>';
	
	$fileName = "articles/".str_replace(" ", "_", trim($row['title'])).".html";
	$file = fopen($fileName, "r");
	
	$content = fread($file, filesize($fileName));
	
	print '<div class="container">'.$content.'</div>';
	print '<div class="container" style="color: #005cbf">
            <a href="#"><i class="fas fa-thumbs-up fa-lg"> : 0</i></a>,
            <a href="#"><i class="fas fa-thumbs-down fa-lg"> : 0</i></a>,
            <a href="#"><i class="fas fa-comment fa-lg">0</i></a></div>';
	print '</div>';
}
$comment = "";
$ecomment = "";
if(isset($_POST['submit']))
{
	$comment = $_POST['comment'];
	$er = 0;
	if($comment == "")
	{
		$er++;
		$ecomment = '<span class="error">Required</span>';
	}
	if($er == 0)
	{
		$sql = "insert into pagesComments(pageId, userId, comment) values(".$_GET['article'].", 1, '".$comment."')";
		if(!mysqli_query($cn, $sql))
		{
			print '<span class="error">'.mysqli_error($cn).'</span>';
		}
	}
}
?>
            </div>
        </div>
    </div>
</div>

<form method="post" action="">
	<div class="container">
        <div class="col-md-6">
            <textarea name="comment" class="form-control" style="margin-top: 2%"></textarea>
            <input type="submit" class="btn btn-success form-control" style="margin-top: 2%" name="submit" value="Comment"/>
        </div>
    </div>
</form>

<?php
$sql = "select id, userId, dateTime, comment from pagesComments where pageId = ".$_GET['article'];
$table = mysqli_query($cn, $sql);
while($row = mysqli_fetch_assoc($table))
{
	print '<div class="container col-md-6">';
	print '<h4>User : '.$row["userId"].', DateTime : '.$row["dateTime"].'</h4>';
	print '<p>'.$row["comment"].'</p>';
	print '</div>';
}


function findImages($pid)
{
	global $cn;
	$sql = "select id, title, image from pageImage where pageId = ".$pid;
	$table = mysqli_query($cn, $sql);
	while($row = mysqli_fetch_assoc($table))
	{
		print '<img src="uploads/images/'.$row["id"].'_'.$row["image"].'" title="'.$row['title'].'"/>';
	}
}

?>

