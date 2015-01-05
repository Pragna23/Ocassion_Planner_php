<?php
include("dbWrapper.php");
$conId=connect_toDB();
if(isset($_POST['RSVP'])){
	if(($_POST['response'])==1)
		updateRSVPFlag($_POST['uid'],$_POST['eid'],$_POST['email'],'Y',$conId);
	else
		updateRSVPFlag($_POST['uid'],$_POST['eid'],$_POST['email'],'N',$conId);
}

function updateRSVPFlag($userId, $eventId, $email, $rsvpFlag, $conId){
	$sql_file ="UPDATE guestlist_tbl set g_rsvp='".$rsvpFlag."' WHERE u_id=".$userId." and e_id=".$eventId." and g_email=\"$email\"";
	$result=mysqli_query($conId,$sql_file);
	echo "Thanks for your response";
	header('Location: guestlist.php?eid='.$eventId);
}
?>