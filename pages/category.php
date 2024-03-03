<div class="container">
    <div class="row">
        <div class="col-xl-12 text-center">
            <a href="?p=category_new">New Category</a>
        </div>
    </div>
</div>
<br><hr>
<div class="container">

<?php
$cn = mysqli_connect("localhost", "root", "", "dbus_002");
$sql = "SELECT c1.id, c1.name, c1.description, c2.name as category
from category as c1
left join category c2 on c1.categoryId = c2.id";
$table = mysqli_query($cn, $sql);

print '<table class="table">';
print '<thead class="thead-dark">
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Category</th>
            <th scope="col">Page Count</th>
            <th scope="col">#</th>
            </tr>
        </thead>';
while($row = mysqli_fetch_assoc($table))
{
	$a = array();
    print '<tbody>';
	print '<tr>';
	print '<td>'.$row["id"].'</td>';
	print '<td>'.$row["name"].'</td>';
	print '<td>'.$row["description"].'</td>';
	print '<td>'.$row["category"].'</td>';
	
	findSubCategory($row["id"], $a);
	
	print '<td>';
	
	$sql = "select count(id) as count from pages where categoryId in (".implode(", ", $a).")";
	$table2 = mysqli_query($cn, $sql);
	while($row2 = mysqli_fetch_assoc($table2))
	{
		print $row2["count"];
	}
	print '</td>';
    print '<td>
        <a href="?p=category_edit"><i class="fas fa-edit fa-lg" style="color: green"></i></a> 
        <a href="?p=category_delete"><i class="fas fa-trash-alt fa-lg" style="color: red"></i></a> 
         </td>';
	print '</tr>';
    print '</tbody>';
}
print '</table>';

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


?>
</div>
