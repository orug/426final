<?php
$con=mysqli_connect("classroom.cs.unc.edu","thrisha","comp426","thrishadb");

if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM login_info");



while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['username'] . "</td>";
echo "<td>" . $row['first_name'] . "</td>";
echo "<td>" . $row['last_name'] . "</td>";
echo "<td>" . $row['email'] . "</td>";
echo "<td>" . $row['swipes'] . "</td>";

echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>