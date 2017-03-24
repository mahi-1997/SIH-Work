<?php
session_start();
//connect to server
$dbhost = 'localhost';
  $user = 'root';
  $password = '';
  $db='sihwork';

$dbcon = mysqli_connect($dbhost,$user, $password,$db);
?>

<form name="form1"  method="post">
<table>
<tr>
<td>Select State :</td>
<td>
<select id="state"  onChange = "get_state()" >
<option>--select--</option>
<?php
$res=mysqli_query($dbcon,"SELECT * FROM `national_list`");
while($row=mysqli_fetch_array($res))
{
?>
<option value="<?php  echo $row["State ID"];?>"> <?php  echo $row["State"];?> </option>
<?php	
}
?>
</select>
</td>
</tr>

<tr>
<td>Select District :</td>
<td>
<div id="district">
<select>
<option>--select--</option>
</select>
</div>

</td>
</tr>


</table>

</form>

<script type="text/javascript">
function get_state(){
	var xmlhttp= new XMLHttpRequest();
	xmlhttp.open("GET","populatedistrict.php?stateID="+document.getElementById("state").value ,false);
	xmlhttp.send(null);
	document.getElementById("district").innerHTML=xmlhttp.responseText;
}
</script>