<!DOCTYPE html>
<html>
<head>
	<title>Jquery Loadmore</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<Style>
		body{
			background:#16a085;
		}
		.container{
			background:white;
			padding:30px;
			margin:40px auto;
			width:500px;
		}
	</style>
	<script src="http://code.jquery.com/jquery-git2.min.js" type="text/javascript" ></script>
	<script>
		$(function(){
				$('.loadmore').click(function(){
					var val = $('.final').attr('val');
					$.post('fbloadmore.php',{'from':val},function(data){
						if(!isFinite(data))
						{
							$('.final').remove();
							$(data).insertBefore('.loadmore');
						}
						else
						{
							$('<div class="well">No more feeds</div>').insertBefore('.loadmore');
							$('.loadmore').remove();
						}	
							
					});
				});
		});
	</script>
</head>
<?php
	require_once 'fbloadmore.php';
	
?>
<body>
<div class="container">
	<div class="well">
		<h1>Announcements</h1>
		<p>Welcome to RTE announcements</p>
	</div>
	
	
	<div>
		<?php echo $data; ?>
	</div>

	<button class="btn btnt-primary loadmore" >Loadmore</button>
</div>

</body>


</html>

<?php
class feeds{
	
	public function query($from,$to)
	{   session_start();
      //connect to server
     $dbhost = 'localhost';
       $user = 'root';
     $password = '';
      $db='sihwork';

        $dbcon = mysqli_connect($dbhost,$user, $password,$db)or die('error');
		
		$query = "select * from `rte_announcements` where id>$from and id<$to";
		$result = mysqli_query($dbcon,$query);
		$count = mysqli_num_rows($result);
		$data = '';
		if($count>0)
		{
			while($row =mysqli_fetch_array($result))
			{
				$id = $row['id'];
				$feed = $row['Announcements'];
				$data = $data.'<blockquote><p>'.$feed.'</p></blockquote>';
			}
			$data=$data.'<div class="final" val="'.$id.'" ></div>';
			return $data;
		}
		else{
			echo '0';
		}
		
	}
	
	public function main()
	{
		if(isset($_POST['from']))
		{
			$from=$_POST['from'];
			$to = $from+3;
			$data = $this->query($from,$to);
			echo $data;
		}else
		{
			$data = $this->query(0,3);
			return $data;
		}
	}
	
}	
$obj = new feeds();
$data = $obj->main();
?>



