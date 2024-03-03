<br>
<div class="container">
    <div class="row">
        <div class="col-xl-12 text-center">
            <a href="?p=pages_new">New Pages</a>
        </div>
    </div>
</div>
<br>
<hr>
<div class="container">

<?php
$cn = mysqli_connect("localhost", "root", "", "dbus_002");
$sql = "select p.id, p.title, p.tags, p.createDate, p.userId, p.hitCount, c.name as category
from pages p
		left join category as c on p.categoryId = c.id";
$table = mysqli_query($cn, $sql);

print '<table class="table">';
print '<thead class="thead-dark"><tr><th scope="col">Basic Info</th><th scope="col">Content</th><th scope="col">#</th></tr></thead>';
while($row = mysqli_fetch_assoc($table))
{
    print '<tbody>';
	print '<tr>';
	print '<td><p>'.$row["title"].'</p><br><b>'.$row["tags"].'</b><br>';
	print $row["createDate"].', By : ';
	print $row["userId"].'<br>';
	print '<b>Hit : </b>'.$row["hitCount"].', in : ';
	print $row["category"].'</td>';
	print '<td>';
	
	$fileName = "articles/".str_replace(" ", "_", trim($row['title'])).".html";
	$file = fopen($fileName, "r");
	
	$content = fread($file, filesize($fileName));
	
	print substr(strip_tags($content), 0, 600);
	print ' ... .. . <a href="#">Read More</a>';
	print '</td>';
    print '<td>
        <a href="?p=pages_edit&id='.$row["id"].'"><i class="fas fa-edit fa-lg" style="color: green"></i></a> 
        <a href="?p=pages_delete&id='.$row["id"].'"><i class="fas fa-trash-alt fa-lg" style="color: red"></i></a> 
         </td>';
	print '</tr>';
    print '</tbody>';
}
print '</table>';
?>
</div>
