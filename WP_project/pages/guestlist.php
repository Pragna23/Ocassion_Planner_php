<?php 
	session_start();
	include("dbWrapper.php");
	$conId=connect_toDB();
	
	if(isset($_SESSION["userid"]))
		$UserId= $_SESSION["userid"];
	if(isset($_REQUEST["eid"]))
	{
		$EventId=$_REQUEST["eid"];
		$eventId = $_REQUEST["eid"];
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
			<?php include("/templatemainframe/headerLogoLinks.html"); ?>
		</div>
		<div class="occasionListBg">
			<?php include("/templatemainframe/eventlinks.php"); ?>
		</div>
		<div style="width:80%;border-radius:10px" class="center">
			<div id="toDoListLinkContent" style="width:100%;height:40px" >
				<?php include("/templatemainframe/eventsublinks.php"); ?>
			</div>
			<div id="toDoListLinkContent" style="background-color:#e9dfc6;min-height:400px;margin:0px;vertical-align:top;color:#000">
				<?php include("guestlisttrial.php"); ?>
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
	
	<?php function checkfortodolist($dbname, $conId, $userid, $eventid, $ename)
	{
		//echo $ename;
		
		$sel_sql = "select * from ".$dbname.".todolist_tbl where u_id=".$userid." and e_id=".$eventid.";";
		
		if (! $res=mysqli_query($conId, $sel_sql)) 
		{
			echo mysqli_error($conId);
			exit;
		}
		else 
		{
			if(mysqli_num_rows($res) == 0)
			{
				echo '<section id="newToDolist">';
				echo '<br><br><label class="subText" style="margin-left:10px">You do not have any To-Do List created for '.ucwords($ename).'.</label>';
				echo '<br><br><input type="button" class="buttonCss" value="Create ToDo list for '.ucwords($ename).'" onclick="showHideSections(\'createToDo\',\'newToDolist\')" />';
				echo '</section>';
			}
			else
			{
				echo '<section id="showAllToDo">';
				echo '<br><br><label class="subText" style="margin-left:10px">My To-Do List for '.ucwords($ename).' event.</label>';
				echo '<table cellspacing="0" cellpadding="0" border="1" style="width:80%;margin:10px">';
				echo '<tr><th><center>Task Name</center></th><th>Due Date</th><th>Edit</th><th>Delete</th></tr>';
				while($tasklistarr = mysqli_fetch_assoc($res))
				{
					echo '<tr>
							<td class="subText">'.$tasklistarr["t_name"].'<br><label class="subHeading">Description:'.$tasklistarr["t_desc"].'</label></td>
							<td class="subText">12/11/2014</td>
							<td class="subText">Edit Image</td>
							<td class="subText">Delete image</td>
						</tr>';
				}
				echo '</table>';
				echo '<br><br><input type="button" class="buttonCss" value="Add More ToDo list" onclick="showHideSections(\'createToDo\',\'showAllToDo\')" />';
				echo '</section>';
			}
		}	
	}
	?>
</html>