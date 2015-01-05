<?php 
	session_start();
	$eventId = "";
	if(isset($_SESSION["userid"]))
		$userId = $_SESSION["userid"];
	include("dbWrapper.php");
	$conId=connect_toDB();
	if(isset($_REQUEST["eid"]))
	$eventId = $_REQUEST["eid"];
	
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
	if(isset($_REQUEST["save"]))
	{
		$taname = $_REQUEST["tname"];
		$tadesc = $_REQUEST["tdesc"];
		$tadue = $_REQUEST["tdue"];
		$taapprox = $_REQUEST["tapprox"];
		$hflag = $_REQUEST["helper"];
		
		if($hflag == "N")
		{
			$sqlQuery = "insert into todolist_tbl(u_id,e_id,t_name,t_desc,t_duedate,t_approxprice,t_helper_flag) VALUES ('".$userId."','".$eventId."','".strip_tags(addslashes($taname))."','".strip_tags(addslashes($tadesc))."','".$tadue."','".$taapprox."','".$hflag."')";
		}
		else
		{
			$sqlQuery = "insert into todolist_tbl(u_id,e_id,t_name,t_desc,t_duedate,t_approxprice,t_helper_flag,t_helper_name,t_helper_email) VALUES ('".$userId."','".$eventId."','".strip_tags(addslashes($taname))."','".strip_tags(addslashes($tadesc))."','".$tadue."','".$taapprox."','".$hflag."','".strip_tags(addslashes($_REQUEST["hname"]))."','".strip_tags(addslashes($_REQUEST["hemail"]))."')";
		}
		if (! $res=mysqli_query($conId, $sqlQuery)) 
		{
			echo mysqli_error($conId);
			exit;
		}
		else 
		{
			header('Location:todo.php?eid='.$_REQUEST["eid"]);
			
		}
	}
	$sel_sql = "select u_first_name, u_email from userinfo_tbl where u_id='".$userId."';";
	if (! $res=mysqli_query($conId, $sel_sql)) 
	{
		echo mysqli_error($conId);
		exit;
	}
	else 
	{
		$usernamearr = mysqli_fetch_array($res);
		$uname = $usernamearr[0];
		$uemail = $usernamearr[1];
	}	
?>
<!DOCTYPE HTML>
	<head>
		<title>NostressCelebration Event Planners</title>
		<link href="../css/style.css" type="text/css" rel="stylesheet" />
		<script src="../js/functions.js" type="text/javascript" ></script>
		<link href='http://fonts.googleapis.com/css?family=Dancing+Script' rel='stylesheet' type='text/css'>
	</head>
	<body>
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
					<?php checkfortodolist($conId, $userId,$eventId, $eventname, $uname, $uemail);
							if(isset($_REQUEST["edit"]))
							{
								$tanameid = "name".$_REQUEST["tid"];	
								$tadueid = "due".$_REQUEST["tid"];
								$taapproxid = "approx".$_REQUEST["tid"];
							}
					?>
				</section>
				<section id="createToDo" style="display:none">
					<?php include("todo.html"); ?>
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
	
	<?php 
	function checkfortodolist($conId, $userid, $eventid, $ename, $username, $useremail)
	{
		$sel_sql = "select * from todolist_tbl where u_id=".$userid." and e_id=".$eventid.";";
		
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
				echo '<br><br><input type="button" class="buttonCss" value="Create ToDo list for '.stripslashes(ucwords($ename)).'" onclick="showHideSections(\'createToDo\',\'newToDolist\')" />';
				echo '</section>';
			}
			else
			{
				echo '<section id="showAllToDo" style="text-align:left">';
				echo '<br><br><label class="subText" style="margin-left:10px">My To-Do List for '.stripslashes(ucwords($ename)).' event.</label>';
				echo '<table cellspacing="0" cellpadding="0" border="0" style="width:90%;margin:10px;text-align:left">';
				echo '<tr><th style="text-align:left">Task Name</th><th>Due Date</th><th>Approx Price</th><th></th><th></th><th></tr>';
				echo '<tr><td colspan="6"><br></td></tr>';
				while($tasklistarr = mysqli_fetch_assoc($res))
				{
					echo '<tr>
							<td class="subText" style="width:50%"><input style="width:100%" class="labelTreat" id="name'.$tasklistarr["t_id"].'" name="name'.$tasklistarr["t_id"].'" type="text" value="'.stripslashes(ucfirst($tasklistarr["t_name"])).'" disabled /></label></td>
							<td class="subText" style="width:15%"><input style="width:100%" class="labelTreat" id="due'.$tasklistarr["t_id"].'" name="due'.$tasklistarr["t_id"].'" type="text" value="'.$tasklistarr["t_duedate"].'" disabled /></label></td>
							<td class="subText" style="width:15%"><input class="labelTreat" id="approx'.$tasklistarr["t_id"].'" name="approx'.$tasklistarr["t_id"].'" type="text" value="'.$tasklistarr["t_approxprice"].'" disabled /></label></td>';	
							if($tasklistarr["t_actualprice"] == NUll)
								echo '<td class="subText" style="width:15%"><!--<input id="actual'.$tasklistarr["t_id"].'" name="actual'.$tasklistarr["t_id"].'" type="text" />--></td>';
							else
								echo '<td class="subText" style="width:15%"><input id="actual'.$tasklistarr["t_id"].'" name="actual'.$tasklistarr["t_id"].'" type="text" value="'.$tasklistarr["t_actualprice"].'" disabled /></label></td>';
					echo		'<td><form action="edittodo.php?tid='.$tasklistarr["t_id"].'&eid='.$eventid.'" method="post">
									<input type="submit" class="" value="Edit" /></a></form></td>
								 <td><form method="post" action="delete.php?tid='.$tasklistarr["t_id"].'&eid='.$eventid.'">
									<input type="submit" class="" value="Delete" /></a></form></td>';
						echo '</tr>';
						echo '<tr><td colspan="6">Description:'.stripslashes($tasklistarr["t_desc"]).'</td></tr>';
						if($tasklistarr["t_helper_flag"] == "Y")
						{
							echo '<tr><td colspan="6">Helper:'.stripslashes($tasklistarr["t_helper_email"]).'</td></tr>';
							
							echo '<tr><td colspan="6"><form action="sendmail.php?help=1" method="post"><input type="text" style="display:none" name="helperemail" value="'.stripslashes($tasklistarr["t_helper_email"]).'" /><input type="text" name="helpername" style="display:none" value="'.stripslashes($tasklistarr["t_helper_name"]).'" /><input type="text" name="useremail" style="display:none" value="'.stripslashes($useremail).'" /><input type="text" name="username" style="display:none" value="'.stripslashes($username).'" /><input type="text" style="display:none" name="evid" value="'.$eventid.'" /><input type="submit" class="" value="Send Email To Helper" /></a></form></td></tr>';
						}
						echo '<tr><td colspan="6"><hr></td></tr>';
				}
				echo '</table>';
				echo '<br><br><input type="button" class="buttonCss" value="Add More ToDo list" onclick="showHideSections(\'createToDo\',\'showAllToDo\')" />';
				echo '<br><br></section>';
			}
		}	
	}
	
	?>
</html>
<?php
disconnect($conId);
?>