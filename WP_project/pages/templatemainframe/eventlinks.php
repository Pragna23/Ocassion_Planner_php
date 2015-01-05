<?php
	$linksList = '<section style="height:40px;" class="center">
							<nav id="occasionList">
								<ul>';

	$sel_sql = "select e_id, e_name from event_tbl";
	if (! $res=mysqli_query($conId, $sel_sql)) 
	{
		echo mysqli_error($conId);
		exit;
	}
	else 
	{
		while($eventArr = mysqli_fetch_assoc($res))
		{
			if(isset($_REQUEST["eid"]))
			{
				if($_REQUEST["eid"] == $eventArr["e_id"])
					$linksList.= '<li class="active">&nbsp;&nbsp;<a href="todo.php?eid='.$eventArr["e_id"].'">'.ucwords($eventArr["e_name"]).'</a>&nbsp;&nbsp;|</li>';
				else
					$linksList.= '<li >&nbsp;&nbsp;<a href="todo.php?eid='.$eventArr["e_id"].'">'.ucwords($eventArr["e_name"]).'</a>&nbsp;&nbsp;|</li>';
				
			}
			else
			{
				$linksList.= '<li >&nbsp;&nbsp;<a href="todo.php?eid='.$eventArr["e_id"].'">'.ucwords($eventArr["e_name"]).'</a>&nbsp;&nbsp;|</li>';
			}
		}

	}	
	$linksList.= '		</ul>
					</nav>
			</section>';
						
	echo $linksList;
?>