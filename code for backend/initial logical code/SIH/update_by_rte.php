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

if(isset($_POST['addschool'])){
$school_name= mysqli_real_escape_string( $dbcon,trim($_POST['schoolname']));
$school_id=mysqli_real_escape_string( $dbcon,trim($_POST['schoolID']));

 $query_add_school="INSERT INTO `school_list` (`id`, `School`, `School ID`, `District`, `State`, `About`) VALUES (NULL, '$school_name','$school_id', '', '', '')";

$result=mysqli_query($dbcon,$query_add_school);

if($result)
	echo "school added!!!!!!!";


$contact_table= "Contact_".$school_id;
$meeting_table= "Meeting_".$school_id;
$fund_table= "Fund_".$school_id;
$completedtask="Task_".$school_id;




// sql to create Contact table for school
$sql = "CREATE TABLE ".$contact_table." (
id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
Name VARCHAR(30) ,
Position VARCHAR(30),
Mobile VARCHAR(15)
)";
$result=mysqli_query($dbcon,$sql);

// sql to create Meeting table for school
$sql = "CREATE TABLE ".$meeting_table." (
id INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
SDP VARCHAR(250) ,
Decisions VARCHAR(500),
Date VARCHAR(15)
)";
mysqli_query($dbcon,$sql);

// sql to create fund table for school
$sql = "CREATE TABLE ".$fund_table." (
id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
Month VARCHAR(10) ,
Year YEAR,
Fund_sought VARCHAR(20),
Fund_received VARCHAR(20),
Used VARCHAR(250) 

)";  //you have to make changes here in date &time
mysqli_query($dbcon,$sql);

// sql to create completed table for school
$sql = "CREATE TABLE ".$completedtask."(
id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
Task VARCHAR(50) ,
Implemetation VARCHAR(250) 

)";  //you have to make changes here in date &time
mysqli_query($dbcon,$sql);


}

//add smc member
if(isset($_POST['addsmcmember'])){
$name= mysqli_real_escape_string( $dbcon,trim($_POST['name']));
$memberId=mysqli_real_escape_string( $dbcon,trim($_POST['memberID']));
$randUID=rand(100000,999999);

$add_query="INSERT INTO `smc_member_data` (`Sr No`, `name`, `mobile`, `position`, `school`, `district`, `state`, `member ID`, `Useraname`, `password`, `Random UID`) VALUES (NULL, '$name', '', '', '', '', '', '$memberId', '', '', '$randUID')";

mysqli_query($dbcon,$add_query);
	
}
//add RTE member

if(isset($_POST['addrtemember'])){
$name= mysqli_real_escape_string( $dbcon,trim($_POST['rte_name']));
$memberId=mysqli_real_escape_string( $dbcon,trim($_POST['rtememberID']));
$mobile= mysqli_real_escape_string( $dbcon,trim($_POST['rte_mobile']));
$position=mysqli_real_escape_string( $dbcon,trim($_POST['rte_position']));
$randUID=rand(100000,999999);
$add_query="INSERT INTO `rte_officials` (`Sr No`, `name`, `mobile`, `position`, `Member ID`, `Username`, `password`, `Random UID`) VALUES (NULL, '$name', '$mobile', '$position', '$memberId', '', '', '$randUID')";

mysqli_query($dbcon,$add_query);
	
}




?>

</head>
<body>
    
	<form action="update_by_rte.php" method="POST" >
     <! add new school to databse>	
	 
	 <fieldset class="add_school">
	  <legend>ADD NEW SCHOOL:</legend>
	  <p><label for="school_name" >School Name:</label><input type="text" name="schoolname"id="schoolname"/><br/></p>
	  <p><label for="school_id">School ID:</label><input type="text" name="schoolID"  id="schoolID"/><br/></p>
	  </fieldset>
	  <br/>
	  <input type="submit" name="addschool" value="Add School" class="addschool" />
	
	  
	  <! add new SMC member to databse>
	  <fieldset class="add_smc_member">
	  <legend>ADD NEW SMC Member:</legend>
	  <p><label for="name" >Name:</label><input type="text" name="name"id="name"/><br/></p>
	  <p><label for="member_id">Member ID:</label><input type="text" name="memberID"  id="memberID"/><br/></p>
	  </fieldset>
	  <br/>
	  <input type="submit" name="addsmcmember" value="Add SMC Member" class="addsmcmember" />
	  
	  <! add new RTE member to databse>	
	  <fieldset class="add_rte_member">
	  <legend>ADD NEW RTE Member:</legend>
	  <p><label for="rte_name" >Name:</label><input type="text" name="rte_name"id="rte_name"/><br/></p>
	  <p><label for="rte_member_id">Member ID:</label><input type="text" name="rtememberID"  id="rtememberID"/><br/></p>
	  <p><label for="rte_mobile" >Mobile:</label><input type="text" name="rte_mobile"id="rte_mobile"/><br/></p>
	  <p><label for="rte_position" >Position:</label><input type="text" name="rte_position"id="rte_position"/><br/></p>
	  
	  </fieldset>
	  <br/>
	  <input type="submit" name="addrtemember" value="Add RTE Member" class="addrtemember" />
	  
	  

	  
	  </form>
	  
	  
</body>
</html>


