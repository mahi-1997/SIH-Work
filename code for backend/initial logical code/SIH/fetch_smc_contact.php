<?php

session_start();
//connect to server
$dbhost = 'localhost';
  $user = 'root';
  $password = '';
  $db='sihwork';

$dbcon = mysqli_connect($dbhost,$user, $password,$db);
if($dbcon)
	
echo "Connected to server!!!!!!!";
else
	echo "not  Connected to server!!!!!!!";

$getContact = "SELECT `name`,`mobile`,`position` FROM `smc_member_data` WHERE  1" ;
$result = mysqli_query($dbcon,$getContact);

echo "<table border='1'>
<tr>
<th>SMC Member</th>

</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>".$row['name']."<br/>".$row['position']."<br/>".$row['mobile']."</td>";

echo "</tr>";
}
echo "</table>";


?>