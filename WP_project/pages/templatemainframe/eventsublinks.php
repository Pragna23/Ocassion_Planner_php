<?php 
	
	$activitiLinksList = '<nav id="activityList" style="width:100%;height:100%">
						<ul style="width:100%;height:100%">';
	$sel_sql = "select e_id, e_subitems,e_urls from event_tbl where e_id='".$eventId."';";
	if (! $res=mysqli_query($conId, $sel_sql)) 
	{
		echo mysqli_error($conId);
		exit;
	}
	else 
	{
		while($eventSubLinkArr = mysqli_fetch_assoc($res))
		{
			$activitiLinksList.= '<li style="margin-left:0px;display:inline-block;width:16%;padding-top:0px; border-right:solid 1px #fff;height:100%;text-align:center">&nbsp;&nbsp;<a href="todo.php?eid='.$eventSubLinkArr["e_id"].'">To-Do List</a>&nbsp;&nbsp;</li> ';
			$activitiLinksList.= '<li style="margin-left:0px;display:inline-block;width:16%;padding-top:0px; border-right:solid 1px #fff;height:100%;text-align:center">&nbsp;&nbsp;<a href="guestlist.php?eid='.$eventSubLinkArr["e_id"].'">Guest List</a>&nbsp;&nbsp;</li> ';
			$activitiLinksList.= '<li style="margin-left:0px;display:inline-block;width:16%;padding-top:0px; border-right:solid 1px #fff;height:100%;text-align:center">&nbsp;&nbsp;<a href="invite.php?eid='.$eventSubLinkArr["e_id"].'">Invitation</a>&nbsp;&nbsp;</li> ';
			$activitiLinksList.= '<li style="margin-left:0px;display:inline-block;width:16%;padding-top:0px; border-right:solid 1px #fff;height:100%;text-align:center">&nbsp;&nbsp;<a href="helper.php?eid='.$eventSubLinkArr["e_id"].'">Helper</a>&nbsp;&nbsp;</li> ';
			$activitiLinksList.= '<li style="margin-left:0px;display:inline-block;width:16%;padding-top:0px; border-right:solid 1px #fff;height:100%;text-align:center">&nbsp;&nbsp;<a href="services.php?eid='.$eventSubLinkArr["e_id"].'">Services</a>&nbsp;&nbsp;</li> ';
			$activitiLinksList.= '<li style="margin-left:0px;display:inline-block;width:16%;padding-top:0px; border-right:solid 1px #fff;height:100%;text-align:center">&nbsp;&nbsp;<a href="addreview.php?eid='.$eventSubLinkArr["e_id"].'">Testimonials</a>&nbsp;&nbsp;</li> ';
		}

	}	
	$activitiLinksList .=   '</ul>
					  </nav>';
	echo $activitiLinksList;
	
	
?>