<?php
session_start();
	if(isset($_SESSION["sid"]))
		$sId = $_SESSION["sid"];
	if(isset($_REQUEST["eid"]))
				$eventId = $_REQUEST["eid"];
	if(isset($_REQUEST["tid"]))
				$taskId = $_REQUEST["tid"];
		include("dbWrapper.php");
		$conId=connect_toDB();

$sel_sql = 'delete from serviceprovider_tbl where s_id='.$sId;
					
if (! $res=mysqli_query($conId, $sel_sql)) 
{
	echo mysqli_error($conId);
	exit;
}
else 
{	
	unset($_SESSION);
	session_destroy();
	header('Location:index.php');
}
		
?>