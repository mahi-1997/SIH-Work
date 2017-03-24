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
/*
if(isset($_POST['signUp'])){
	$memberID= mysqli_real_escape_string( $dbcon,trim($_POST['memberID']));
$username= mysqli_real_escape_string( $dbcon,trim($_POST['username']));
$pass=mysqli_real_escape_string( $dbcon,trim($_POST['password']));
$repass=mysqli_real_escape_string(  $dbcon,trim($_POST['repassword']));
$randomUID= mysqli_real_escape_string( $dbcon,trim($_POST['randomUID']));

$sql_rand = "SELECT `Random UID` FROM `rte_officials` WHERE `Member ID` ='$memberID'" ;

$rand_db=mysqli_query($dbcon,$sql_rand);

$get_rand=mysqli_fetch_row($rand_db);

if($get_rand[0]==$randomUID){
	if($pass==$repass){
	$querysignup= "UPDATE `rte_officials` SET `Username`='$username',`password`='$pass'  WHERE `Member ID`='$memberID'" ;
	$result=mysqli_query($dbcon,$querysignup);	
	if($result){
		echo "signup succesfull..";
	}
	}
	else{
		echo "password not matching..";
	}
	
}
else{
	echo"wrong UID number ..please check";
}


}
*/
?>

</head>
<body>
    
	
	  
	  
	  <select name="state" onchange="this.form.submit()" >
	  <h2>State:</h2>
	  <?php
       $sql ="select *  from `national_list` order by `State` asc" ;
       $sql_result = mysqli_query ($sql, $dbcon ) or die ( "Could not execute SQL query");
          while ($cust = mysqli_fetch_assoc($sql_result)) {
            echo "<option value='".$cust["State ID"]."'>".$cust["State"]."</option>"; } ?>
	  
	  </select>
	  
	  <select name="district" onchange="this.form.submit()" >
	  <h2>District:</h2>
	  <?php
	   echo $_REQUEST['state'];
       $sql ="select *  from `state_".$_REQUEST['state']."` order by `District` asc" ;
       $sql_result = mysqli_query ($sql, $dbcon ) or die ( "Could not execute SQL query");
          while ($cust = mysqli_fetch_assoc($sql_result)) {
            echo "<option value='".$cust["District ID"]."'>".$cust["District"]."</option>"; } ?>
	  
	  </select>
	  
	  
	  <!--
	  <input type="submit" name="signUp" value="signUp" class="signUp" />
	  </form>
	  -->
	  
	  
</body>
</html>


