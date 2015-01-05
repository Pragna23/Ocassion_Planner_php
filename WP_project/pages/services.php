<?php 
	$eventId = "";
	session_start();
	$userId = $_SESSION["userid"];
	include("dbWrapper.php");
	$conId=connect_toDB();
	if(isset($_REQUEST["eid"]))
		$eventId = $_REQUEST["eid"];
	$ServiceCat = ["food","photo","venue"];
	$sel_sql = "select e_name from event_tbl where e_id='".$eventId."';";
	if (! $res=mysqli_query($conId, $sel_sql)) 
	{
		echo mysqli_error($conId);
		exit;
	}
	else 
	{
		$eventarr = mysqli_fetch_array($res);
		$eventname = $eventarr[0];
		//echo $eventname;
	}	
?>
<!DOCTYPE HTML>
	<head>
		<title>NostressCelebration Event Planners</title>
		<link href="../css/style.css" type="text/css" rel="stylesheet" />
		<script src="../js/functions.js" type="text/javascript" ></script>
		<link href='http://fonts.googleapis.com/css?family=Dancing+Script' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Tangerine' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Satisfy' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Zeyada' rel='stylesheet' type='text/css'>
		
	</head>
	<body>
		<?php  ?>
		<div class="logoBg">	
			<?php include("/templatemainframe/headerLogoLinks.php"); ?>
		</div>
		<div class="occasionListBg">
			<?php include("/templatemainframe/eventlinks.php"); ?>
		</div>
		<div style="width:80%;border-radius:10px" class="center">
			<div id="toDoListLinkContent" style="width:100%;height:40px" >
				<?php include("/templatemainframe/eventsublinks.php"); ?>
			</div>
			<div id="toDoListLinkContent" style="background-color:#e9dfc6;min-height:400px;margin:0px;vertical-align:top;color:#000">
				<section style="width:96%;margin-left:10px;margin-top:20px">
					<label class="mainHeading">To-Do List</label><hr>
					<section>
						<br><hr>
						<form action="services.php?search=1&eid=<?php echo $eventId?>" method="post"><label class="subText">Search with price:</label><input type="text" name="searchprice" /><input type="submit" class="buttonCss" value ="Search"/></form><hr>
						<?php
						if(isset($_REQUEST["search"]))
						{
							foreach($ServiceCat as $key)
							{
								searchwithprice( $conId, $key, $_REQUEST["searchprice"]);
							}
								
						}
						else
						{
							foreach($ServiceCat as $key)
							{
								checkforService( $conId, $userId,$eventId,$key); 
							}
						
						}
						?>
					</section>
				</section>
			</div>
			
		</div>
		<div>
			<br>
		</div>
		<div class="occasionListBg">
			<section style="height:40px;" class="center" style="font-size:12px;" align="center">
				<label style="color:#ccc;"><br>Copyright &copy; at NoStressCelebration Occasion Celebration Planner</label>
			</section>
		</div>
	</body>
	
	
</html>
<?php 
	function checkforService( $conId, $userid, $eventid, $servicename)
	{
		$sel_sql = "select s_id, c_photo, c_name from serviceprovider_tbl where s_category='".stripslashes($servicename)."';";
		
		if (! $res=mysqli_query($conId, $sel_sql)) 
		{
			echo mysqli_error($conId);
			exit;
		}
		else 
		{
			if(mysqli_num_rows($res) == 0)
			{
				echo '<section>';
				echo '<br><br><label class="subText" style="margin-left:10px">'.ucwords($servicename).'.</label>';
				echo '<br><br><label class="subText" style="margin-left:10px">No Services available for '.stripslashes(ucwords($servicename)).'</label>';
				echo '</section>';
			}
			else
			{
				echo '<section';
				echo '<br><br><label class="subText" style="margin-left:10px">'.stripslashes(ucwords($servicename)).'</label>';
				echo '<table cellspacing="0" cellpadding="0" border="1" style="width:80%;margin:10px">';
				echo '<tr><th><center></center></th><th></th><th></th><th></th>';
				$i = 0;
				while($servicearr = mysqli_fetch_assoc($res))
				{
					if(($i % 4) == 0)
						echo '</tr><tr>';
				
					echo '<td class="subText"><a href="serviceprovider.php?sid='.$servicearr["s_id"].'">'.stripslashes($servicearr["c_name"]).'</a></td>';
					$i++;		
				}
				echo '</table>';
			
				echo '</section>';
				echo '<hr>';
			}
		}	
	}
	
	function searchwithprice( $conId, $servicename, $price)
	{
		$sel_sql = 'select s_id, c_photo, c_name from serviceprovider_tbl where s_category="'.stripslashes($servicename).'" and s_minprice <='.$price.';';
		//echo $sel_sql;
		
		if (! $res=mysqli_query($conId, $sel_sql)) 
		{
			echo mysqli_error($conId);
			exit;
		}
		else 
		{
			if(mysqli_num_rows($res) == 0)
			{
				echo '<section>';
				echo '<br><br><label class="subText" style="margin-left:10px">'.stripslashes(ucwords($servicename)).'.</label>';
				echo '<br><br><label class="subText" style="margin-left:10px">No Services available for '.ucwords($servicename).'</label>';
				echo '</section>';
			}
			else
			{
				echo '<section>';
				echo '<br><br><label class="subText" style="margin-left:10px">'.stripslashes(ucwords($servicename)).'</label>';
				echo '<table cellspacing="0" cellpadding="0" border="1" style="width:80%;margin:10px">';
				echo '<tr><th><center></center></th><th></th><th></th><th></th>';
				$i = 0;
				while($servicearr = mysqli_fetch_assoc($res))
				{
					if(($i % 4) == 0)
						echo '</tr><tr>';
				
					echo '<td class="subText"><a href="serviceprovider.php?sid='.$servicearr["s_id"].'">'.stripslashes($servicearr["c_name"]).'</a></td>';
					$i++;		
				}
				echo '</table>';
			
				echo '</section>';
				echo '<hr>';
			}
		}	
	}
?>