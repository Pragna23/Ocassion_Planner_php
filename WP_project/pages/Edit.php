<!-- Event Edition php -->
<!-- Edit Data from database by clicking on Edit link ---> 
<html>
	<head>
	</head>
<body>
<?php
	include("connection.inc.php");
	$lid=connect();
	
	if(isset($_GET['edit']))
	{
		$e_id = $_GET['edit'];
		echo $e_id;	
	}
		$select_sql = "SELECT * FROM event_tbl WHERE Event_id='$e_id'";
		$rows = send_sql ($select_sql, $lid);
		$events = mysqli_fetch_array($rows);
		
	if(isset($_POST['newEvent']))
	{
		$newEventName = $_POST['newEvent'];
		$id = $_POST['id'];
		$update_sql = "UPDATE event_tbl SET Event_Name ='$newEventName' WHERE Event_id= '$id'";
		if($rows = send_sql ($update_sql,$lid))
		{
			echo "</br>". "Record updated Successfully " ."</br>";
		}
	}
	
		function send_sql($sql, $link) 
		{
			if (! ($res = mysqli_query($link,$sql)) )
			{
				echo mysqli_connect_error();
				exit;
			}
			return $res;
		}	
?>
		<form action="Edit.php" method="POST">
			 Name : <input type="text" name="newEvent" value="<?php echo $events[1];?>">
			<input type="hidden" name="id" value="<?php echo $events[0];?>">
			<input type="submit" value="Update">
		</form>
	</body>
</html>