<!-- customize invitation -->
<?php
	session_start();
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	if(isset($_SESSION["userid"]))
		$UserId= $_SESSION["userid"];
	if(isset($_REQUEST["eid"]))
	{
		$eventId = $_REQUEST["eid"];
	}
	include("dbWrapper.php");
	$conId=connect_toDB();

	$sel_sql = "SELECT cust_invite, own_invite FROM user_event_tbl WHERE u_id = '$UserId' AND e_id='$eventId' ";
	//echo $sel_sql;
		if (!$res=mysqli_query($conId, $sel_sql)) 
		{
			echo mysqli_error($conId);
			exit;
		}
		else 
		{
			while($greeting = mysqli_fetch_assoc($res))
			{
					if($greeting['cust_invite'] == Null)
					{
						echo "you have selected your own invitation"; 
						$destination = $greeting['own_invite'];
						echo "<img src=\"".$destination."\" style=\"".$destination."\">"; 
					}
					else
					{	
						echo "you have selected customize invitation"; 
						$invitation = $greeting['cust_invite'];
						echo "$invitation";
					}
			}
		}
?>
