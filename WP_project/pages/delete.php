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

$sel_sql = 'delete from todolist_tbl where t_id='.$taskId;
					
					if (! $res=mysqli_query($conId, $sel_sql)) 
					{
						echo mysqli_error($conId);
						exit;
					}
					else 
					{	
						header('Location:todo.php?eid='.$eventId);
					}
?>