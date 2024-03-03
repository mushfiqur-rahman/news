<div class="container">
    <div class="row">
        <div class="col-xl-12 text-center">
            <a href="?p=file_new">New File</a>
        </div>
    </div>
</div>
<br><hr>
<div class="container">

<?php

$sql = "select pf.id, p.title as page, pf.title, pf.dateTime, pf.file 
from pageFile as pf
left join pages as p on pf.pageId = p.id";

$table = mysqli_query($cn, $sql);

print '<table class="table">';
print '<thead class="thead-dark"><tr><th scope="col">Page</th><th scope="col">DateTime</th><th scope="col">File</th><th scope="col">#</th></tr></thead>';
while($row = mysqli_fetch_assoc($table))
{
    print '<tbody>';
	print '<tr>';
	print '<td>'.$row["page"].'</td>';
	print '<td>'.$row["dateTime"].'</td>';
	print '<td><a href="uploads/files/'.$row["id"].'_'.$row['file'].'" height="100px">'.$row['title'].'</a></td>';
    print '<td>
        <a href="?p=file_edit"><i class="fas fa-edit fa-lg" style="color: green"></i></a> 
        <a href="?p=file_delete" name="remove_file"><i class="fas fa-trash-alt fa-lg" style="color: red"></i></a> 
         </td>';
	print '</tr>';
    print '</tbody>';
}
print '</table>';
?>
</div>

