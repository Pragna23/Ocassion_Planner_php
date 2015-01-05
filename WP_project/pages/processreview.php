<?php
	session_start();
	$userId = $_SESSION["userid"];
	include("dbWrapper.php");
	$conId=connect_toDB();

	$reviewmessage = $_REQUEST["review"];
	//$r_rate= 4;
	
	$sqlQuery = "insert into ".$db.".review_tbl (u_id,r_content) VALUES ('".$userId."','".addslashes($reviewmessage)."')";
	if (! $res=mysqli_query($conId, $sqlQuery)) 
	{
		echo mysqli_error($conId);
		exit;
	}
	else 
	{
		header('Location:addreview.php?eid='.$_REQUEST["eid"]);
		
	}

?>