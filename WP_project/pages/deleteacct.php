<?php
session_start();
	if(isset($_SESSION["userid"]))
		$userId = $_SESSION["userid"];
	if(isset($_REQUEST["eid"]))
				$eventId = $_REQUEST["eid"];
	if(isset($_REQUEST["tid"]))
				$taskId = $_REQUEST["tid"];
		include("dbWrapper.php");
		$conId=connect_toDB();

$sel_sql = 'delete from todolist_tbl where u_id='.$userId;
					
if (! $res=mysqli_query($conId, $sel_sql)) 
{
	echo mysqli_error($conId);
	exit;
}
else 
{	
	$sel_sql1 = 'delete from guestlist_tbl where u_id='.$userId;
	if (! $res=mysqli_query($conId, $sel_sql1)) 
	{
		echo mysqli_error($conId);
		exit;
	}
	else 
	{	
		$sel_sql2 = 'delete from review_tbl where u_id='.$userId;
		if (! $res=mysqli_query($conId, $sel_sql2)) 
		{
			echo mysqli_error($conId);
			exit;
		}
		else
		{
			$sel_sql3 = 'delete from userinfo_tbl where u_id='.$userId;
			if (! $res=mysqli_query($conId, $sel_sql3)) 
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
		}
		
	}
}
?>