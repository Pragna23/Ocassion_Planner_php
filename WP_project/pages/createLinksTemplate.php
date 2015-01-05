<?php
	
	include("dbWrapper.php");
	
	
	function createMainLinks()
	{
		$conId=connect_toDB();
		$db= "project";	
		$linksList = '<section style="height:40px;" class="center">
							<nav id="occasionList">
								<ul>';

		$sel_sql = "select e_id,e_name from ".$db.".event_tbl";
		if (! $res=mysqli_query($conId, $sel_sql)) 
		{
			echo mysqli_error($conId);
			exit;
		}
		else 
		{
			while($eventArr = mysqli_fetch_assoc($res))
			{
				$linksList.= 		'<li>&nbsp;&nbsp;<a href="myevent.php?event='.$eventArr["e_name"].'">'.$eventArr["e_name"].'</a>&nbsp;&nbsp;|</li>';
			}

		}	
		$linksList.= '		</ul>
						</nav>
				</section>';
							
		echo $linksList;
	}
	
	function createSubLinksForEvent($ename)
	{
		$conId=connect_toDB();
		$db= "project";	
		
		$activitiLinksList = '<nav id="activityList">
								<ul>';
		$sel_sql = "select e_subitems from ".$db.".event_tbl where e_name='".$ename."';";
		if (! $res=mysqli_query($conId, $sel_sql)) 
		{
			echo mysqli_error($conId);
			exit;
		}
		else 
		{
			while($eventSubLinkArr = mysqli_fetch_assoc($res))
			{
				$activitiLinksList.= 		'<li>&nbsp;&nbsp;<a href="myevent.php?event='.$eventSubLinkArr["e_subitems"].'">'.$eventSubLinkArr["e_subitems"].'</a>&nbsp;&nbsp;|</li>';
			}

		}	
		$activitiLinksList .=   '</ul>
							  </nav>';
		echo $activitiLinksList;
								
	}
	
?>