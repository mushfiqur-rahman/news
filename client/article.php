<?php
$search = "";
if(isset($_POST['btnSearch']))
{
	$search = $_POST['search'];
}
?>
<form method="post">
    <div class="container">
        <div class="row">
            <div class="col-md-8 text-center">


	<input type="text" class="form-control form-control-lg" name="search" value="<?php print $search; ?>"/>
	<input type="submit" class="form-control btn btn-success my-2 " name="btnSearch" value="Search"/>
            </div>
        </div>
    </div>
</form>
<div class="container-fluid">
    <div class="container">
        <div class="col-lg-8">


<?php
$cn = mysqli_connect("localhost", "root", "", "dbus_002");

$a =array();

findSubCategory($_GET['ctg'], $a);

if(isset($_GET['likeId']) && isset($_SESSION['type']))
{
	$sql = "insert into pageLikes(pageId, userId) values(".$_GET['likeId']." ,".$_SESSION['id'].")";
	mysqli_query($cn, $sql);
}


$sql = "select p.id, p.title, p.tags, p.createDate, p.userId, p.hitCount, 
		c.name as category, (select count(id) from pagesComments where pageId = p.id) as comments
 		from pages p
		left join category as c on p.categoryId = c.id where p.categoryId in(".implode(", ", $a).")";

if($search != "")
{
	$sql .= " and (p.title like '%".ms($search)."%' or p.tags like '%".ms($search)."%')";
}

$table = mysqli_query($cn, $sql);

$totalItem = mysqli_num_rows($table);

$page = 1;
if(isset($_GET['page']))
{
	$page = $_GET['page'];
}

$sql .= " limit ".(($page -1) * 4).", 4";

$table = mysqli_query($cn, $sql);

print '<div class="summery"> '.((($page -1) * 4) + 1).' - '.((($page -1) * 4) + 4).' / '.$totalItem.'</div><hr><br>';

$lastPage = $totalItem / 4;
if($totalItem % 4 > 0)
{
	$lastPage += 1;
}

if($page > 1)
{
print '<a href="?c='.$_GET['c'].'&ctg='.$_GET['ctg'].'">First </a> ';
print '<a href="?c='.$_GET['c'].'&ctg='.$_GET['ctg'].'&page='.($page - 1).'">Previous </a> ';
}
if($page < $lastPage)
{
print '<a href="?c='.$_GET['c'].'&ctg='.$_GET['ctg'].'&page='.($page + 1).'">Next </a> ';
print '<a href="?c='.$_GET['c'].'&ctg='.$_GET['ctg'].'&page='.$lastPage.'">Last </a> ';
}


while($row = mysqli_fetch_assoc($table))
{
	print '<div class="article">';
	print '<div class="card-group">';
	print '<div class="card">';
	print '<img class="card-img-top" src="">';
	print '<div class="card-body">';
	print '<h1 class="card-title">'.$row["title"].'</h1>';
	print '<p class="card-text">'.$row["tags"].'</p>';
	print '<p class="card-text"> Created on : '.$row["createDate"].', By : ';
	print $row["userId"].', in : '.$row["category"].' Page Hit : '.$row["hitCount"].'</h2>';

	$fileName = "articles/".str_replace(" ", "_", trim($row['title'])).".html";
	$file = fopen($fileName, "r");
	
	$content = fread($file, filesize($fileName));

	print '<div>';
	findImage($row['id']);
	print substr(strip_tags($content), 0, 600);
	print ' <br>... .. . <a href="?c=articleDetails&article='.$row["id"].'">Read More</a></div>';
	print '<div>';
	$likeUsers = array();
	$likeUsersName = array();
	findLikes($row["id"], $likeUsers, $likeUsersName);
	if(isset($_SESSION['type']))
	{
		if(in_array($_SESSION['id'], $likeUsers))
		{
			print '<a href="#">You and other.  .<i class="fas fa-thumbs-up fa-lg"></i> </a> : ';
		}
		else
		{
			print '<a href="?c='.$_GET['c'].'&ctg='.$_GET['ctg'].'&likeId='.$row['id'].'">Like</a> : ';
		}
	}
	else{
		print ' like ';
	}
	print '<a href="#" title="'.implode("\n", $likeUsersName).'">'.count($likeUsers).'</a>';
	print ', Comments : <a href="#">'.$row['comments'].'</a></div>';
	print '</div>';
	print '</div>';
	print '</div>';
	print '</div>';
}


function findSubCategory($cid, &$a)
{
	global $cn;
	$a[] = $cid;
	
	$sql = "select id from category where categoryId = ".$cid;
	$table = mysqli_query($cn, $sql);
	while($row = mysqli_fetch_assoc($table))
	{
		$a[] = $row["id"];
		findSubCategory($row["id"], $a);
	}
	
}

function findImage($pid)
{
	global $cn;
	$sql = "select id, title, image from pageImage where pageId = ".$pid." limit 0, 1";
	$table = mysqli_query($cn, $sql);
	while($row = mysqli_fetch_assoc($table))
	{
		print '<img src="uploads/images/'.$row["id"].'_'.$row["image"].'" title="'.$row['title'].'"/>';
	}
}


function findLikes($pid, &$likeUsers, &$likeUsersName)
{
	global $cn;
	$sql = "select pl.userId, u.name as user from pageLikes as pl left join users as u on pl.userId = u.id where pl.pageId = ".$pid;
	$table = mysqli_query($cn, $sql);
	while($row = mysqli_fetch_assoc($table))
	{
		$likeUsers[] = $row["userId"];
		$likeUsersName[] = $row["user"];
	}
}
?>
        </div>
    </div>
</div>
