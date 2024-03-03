<br>
<div class="container">
    <div class="row">
        <div class="col-xl-12 text-center">
            <a href="?p=image_new">New Image</a>
        </div>
    </div>
</div>
<br>
<br>
<div class="container">


<?php

$sql = "select pi.id, p.title as page, pi.title, pi.dateTime, pi.image 
from pageImage as pi
left join pages as p on pi.pageId = p.id";

$table = mysqli_query($cn, $sql);

print '<table class="table">';
print '<thead class="thead-dark"><tr><th scope="col">Title</th><th scope="col">Page</th><th scope="col">DateTime</th><th scope="col">Image</th><th scope="col">#</th></tr></thead>';
while($row = mysqli_fetch_assoc($table))
{
	print '<tbody>';
    print '<tr>';
	print '<td>'.$row["title"].'</td>';
	print '<td>'.$row["page"].'</td>';
	print '<td>'.$row["dateTime"].'</td>';
	print '<td><img src="uploads/images/'.$row["id"].'_'.$row['image'].'" height="100px"/></td>';
	print '<td>
        <a href="?p=image_edit"><i class="fas fa-edit fa-lg" style="color: green"></i></a> 
        <a href="?p=image_delete"><i class="fas fa-trash-alt fa-lg" style="color: red"></i></a> 
         </td>';
	print '</tr>';
	print '</tbody>';
}
print '</table>';
?>
</div>

