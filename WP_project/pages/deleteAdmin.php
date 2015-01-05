<!--Event Deletion page --> 
<?php
	include("connection.inc.php");
	$lid=connect();
	if(isset($_GET['del']))
	{
		$e_id = $_GET['del'];
		echo $e_id;
	}
		$dlt_sql = "DELETE FROM event_tbl WHERE Event_id='$e_id'";
		$rows = send_sql ($dlt_sql, $lid);
		
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
