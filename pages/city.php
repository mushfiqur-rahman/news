<div class="container">
    <div class="row">
        <div class="col-xl-12 text-center">
            <a href="?p=city_new">New City</a>
        </div>
    </div>
</div>
<br><hr>
<div class="container">
<?php
$sql = "select id, name from city";

$table = mysqli_query($cn, $sql);

print '<table class="table">';
print '<thead class="thead-dark"><tr><th scope="col">Id</th><th scope="col">Name</th><th scope="col">#</th></tr></thead>';
while($row = mysqli_fetch_assoc($table))
{
    print '<tbody>';
	print '<tr>';
	print '<td>'.$row["id"].'</td>';
	print '<td>'.$row["name"].'</td>';
    print '<td>
        <a href=""><i class="fas fa-edit fa-lg" style="color: green"></i></a> 
        <a href=""><i class="fas fa-trash-alt fa-lg" style="color: red"></i></a> 
         </td>';
	print '</tr>';
    print '</tbody>';
}
print '</table>';
?>
</div>
