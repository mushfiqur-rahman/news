<br>
<div class="container">
    <div class="row">
        <div class="col-xl-12 text-center">
            <a href="?p=users_new">Users New</a>
        </div>
    </div>
</div>
<br>
<hr>
<div class="container">

<?php
$sql = "select u.id, u.name, u.contact, u.email, u.createDate, u.createIP, u.type
from users as u";
$table = mysqli_query($cn, $sql);

print '<table class="table">';
print '<thead class="thead-dark"><tr><th scope="col">Name</th><th scope="col">Contact</th><th scope="col">Email</th><th scope="col">CreateDate</th><th scope="col">CreateIP</th><th scope="col">Type</th><th scope="col">#</th></tr>';
while($row = mysqli_fetch_assoc($table))
{
    print '<tbody>';
	print '<tr>';
	print '<td>'.$row["name"].'</td>';
	print '<td>'.$row["contact"].'</td>';
	print '<td>'.$row["email"].'</td>';
	print '<td>'.$row["createDate"].'</td>';
	print '<td>'.$row["createIP"].'</td>';
	print '<td>'.$row["type"].'</td>';
    print '<td>
        <a href="?p=users_edit"><i class="fas fa-edit fa-lg" style="color: green"></i></a> 
        <a href="?p=users_delete"><i class="fas fa-trash-alt fa-lg" style="color: red"></i></a> 
         </td>';
	print '</tr>';
    print '</tbody>';
}
print '</table>';


?>
</div>
