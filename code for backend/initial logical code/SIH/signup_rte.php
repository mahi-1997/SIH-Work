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
?>

</head>
<body>
    
	<form action="signup_rte.php" method="POST" >
	  <fieldset class="personalinfo">
	  <legend>SIGN UP:</legend>
	  <p><label for="memberID" >Member ID:</label><input type="text" name="memberID"id="memberID"/><br/></p>
	  <p><label for="username" >User name:</label><input type="text" name="username"id="username"/><br/></p>
	  <p><label for="password">password:</label><input type="password" name="password"  id="password"/><br/></p>
	   <p><label for="repassword">Re-Enter password:</label><input type="password" name="repassword"  id="repassword"/><br/></p>
	   
	  <p><label for="randomUID">Random UID:</label><input type="text" name="randomUID"  id="randomUID"/><br/></p>
	  
	  </fieldset>
	  <br/>
	  <input type="submit" name="signUp" value="signUp" class="signUp" />
	  </form>
	  
	  
</body>
</html>


