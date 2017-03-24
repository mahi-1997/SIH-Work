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

if(isset($_POST["insert"])){
	$file=addcslashes(file_get_contents($_FILES["image"]["tmp_name"]));
	$query="INSERT INTO imagetable(name) VALUES($file)";
	if(mysqli_query($dbcon,$query)){
		echo "<script>alert("image inserted");</script>";
		
	}
}

?>

</head>
<body>
    
	<br></br>
	<div class="container" style="width:500px;">
	<h3 align="center">Insert image</h3>
	<br/>
	<form method="post" action="uploadimage.php" enctype="multipart/form-data">
	  <input type="file" name ="image" id="image"/>
	  <input type="submit" name ="insert" id="insert" value="insert"/>
	  
	</form>
	<br/>
	<br/>
	<table class="table table-bordered">
	   <tr>
	      <th>Images</th>
	   </tr>
	   <?php
	   $query="SELECT * FROM imagetable ORDER BY id DESC";
	   $result=mysqli_query($dbcon,$query);
	   while($row=mysqli_fetch_array($result)){
		   echo "
		   <tr>
		   <td>
		   <img src="data:image/jpeg;base64,".base64_encode($row['name'])."/>
		   </td>
		   </tr>
		   ";
		   
	   }
	   ?>
	</table>
	
	</div>
	  
	  
</body>
</html>

<script>

$(document).ready(function(){
	$("#insert").click(function(){
		var image_name=$("#image").val();
		if(image_name==''){
			alert("please select image");
			return false;
		}
		else{
			var extension=$("#image").val().split('.').pop().toLowerCase();
			if(jQuery.inArray(extension,[gif,png,jpg,jpeg])==-1){
				alert("invalid image");
				$("#image").val('');
				return false;
			}
			
		}
});
});
</script>

