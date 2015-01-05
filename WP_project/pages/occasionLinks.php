<?php
	
	include("dbWrapper.php");
	$conId=connect_toDB();
	$db= "project";	
	
	function createMainLinks()
	{
		echo $db_host;
		$linksList = '<section style="height:40px;" class="center">
							<nav id="occasionList">
								<ul>';

		$sel_sql = "select * from ".$db.".event_tbl";
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
	
	function createSubLinks()
	{
		
	}
	
?>