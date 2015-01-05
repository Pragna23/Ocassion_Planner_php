<?php 
	session_start();
	$eventId = " ";
	if(isset($_SESSION["userid"]))
		$userId = $_SESSION["userid"];
	if(isset($_REQUEST["eid"]))
		$eventId = $_REQUEST["eid"];
	
	include("dbWrapper.php");
	$conId=connect_toDB();
	
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
	}	
	
?>
<!DOCTYPE HTML>
	<head>
		<title>NostressCelebration Event Planners</title>
		<link href="../css/style.css" type="text/css" rel="stylesheet" />
		<script src="../js/functions.js" type="text/javascript" ></script>
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
				<?php checkforreview($db, $conId, $userId, $eventId) ?>
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
	<?php function checkforreview($dbname, $conId, $userid, $eventid)
	{
		//echo $ename;
		
		$sel_sql = "select * from ".$dbname.".review_tbl where u_id=".$userid.";";
		
		if (! $res=mysqli_query($conId, $sel_sql)) 
		{
			echo mysqli_error($conId);
			exit;
		}
		else 
		{
			$reviewHTML =  '<section style="width:96%;margin-left:10px;margin-top:20px">
									';
			if(mysqli_num_rows($res) == 0)
			{
				$reviewHTML .=  '	<label class="mainHeading">Add Your Review	</label><hr>
									<label class="subText" style="vertical-align:top">Review:</label>&nbsp;&nbsp;&nbsp;&nbsp
									<form action="processreview.php?eid='.$eventid.'" method="post" style="margin-left:30px;margin-top:20px">
										<textarea name="review" placeholder="Enter text for review" style="width:300px;height:200px" required></textarea>
										<br><br>
										<input id="submit" name="submit" type="submit"  class="buttonCss" value="Submit" style="margin-left:150px">
									</form>';
			}
			else
			{
				$reviewarr = mysqli_fetch_assoc($res);
				$reviewHTML .=  '<label class="mainHeading">My Feedback</label><hr>
									<p class="subText">'.$reviewarr["r_content"].'</p>';
				
			}
			$reviewHTML .=  '</section>';
			echo $reviewHTML;
		}	
	}
	?>
	
</html>