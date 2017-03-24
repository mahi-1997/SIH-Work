<?php
session_start();
//connect to server
$dbhost = 'localhost';
  $user = 'root';
  $password = '';
  $db='sihwork';

$dbcon = mysqli_connect($dbhost,$user, $password,$db);

$stateId=$_GET["stateID"];
$query="SELECT * FROM `state_".$stateId."`";
$res=mysqli_query($dbcon,$query);
if($stateId!=""){
echo "<select>";
while($row=mysqli_fetch_array($res))
{
	echo "<option>";
	echo $row["District"];
	echo "</option>";
}
echo "</select>";	
}

?>