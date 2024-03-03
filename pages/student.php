<a href="?p=student_new">Student New</a><br><hr><br>
<?php
$cn = mysqli_connect("localhost", "root", "", "dbus_002");

$sql = "select id, name, contact, email, address, cityId from student";

$table = mysqli_query($cn, $sql);

print '<table>';
print '<tr><th>Id</th><th>Name</th><th>Contact</th><th>Email</th><th>Address</th><th>CityId</th><th>#</th></tr>';
while($row = mysqli_fetch_assoc($table))
{
	print '<tr>';
	print '<td>'.$row["id"].'</td>';
	print '<td>'.htmlentities($row["name"]).'</td>';
	print '<td>'.$row["contact"].'</td>';
	print '<td>'.$row["email"].'</td>';
	print '<td>'.htmlentities($row["address"]).'</td>';
	print '<td>'.$row["cityId"].'</td>';
	print '<td> Edit | Delete </td>';
	print '</tr>';
}
print '</table>';
?>