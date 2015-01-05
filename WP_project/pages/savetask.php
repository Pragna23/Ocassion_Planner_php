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

$sel_sql = 'update todolist_tbl SET t_name="'.strip_tags(addslashes($_REQUEST["tname"])).'",t_desc="'.strip_tags(addslashes($_REQUEST["tdesc"])).'" ,t_duedate = "'.addslashes($_REQUEST["tdue"]).'",t_approxprice="'.addslashes($_REQUEST["tappprice"]).'", t_helper_email = "'.strip_tags(addslashes($_REQUEST["hemail"])).'", t_helper_name = "'.strip_tags(addslashes($_REQUEST["hname"])).'" where t_id='.$taskId;
					
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