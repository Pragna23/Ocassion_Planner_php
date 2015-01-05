<?php 
	session_start();
	if(isset($_SESSION["userid"]))
		$userId = $_SESSION["userid"];
	if(isset($_REQUEST["eid"]))
				$eventId = $_REQUEST["eid"];
	if(isset($_REQUEST["tid"]))
				$taskId = $_REQUEST["tid"];
		include("dbWrapper.php");
		$conId=connect_toDB();
	
	
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
		<?php //$eventId = $_REQUEST["eid"]; ?>
		<div class="logoBg">	
			<?php include("/templatemainframe/headerLogoLinks.php"); ?>
		</div>
		<div class="occasionListBg">
			<?php include("/templatemainframe/eventlinks.php"); ?>
		</div>
		
		<div style="width:80%;" class="center">
			<div id="toDoListLinkContent" style="width:100%;height:40px" >
				<?php include("/templatemainframe/eventsublinks.php"); ?>
			</div>
			<div id="toDoListLinkContent" style="background-color:#e9dfc6;min-height:400px;margin:0px;vertical-align:top;color:#000">
			<label class="mainHeading">Edit To-Do</label><hr><br><br>
			<div>
				<?php
					$sel_sql = "select * from todolist_tbl where t_id =".$taskId;
					echo '<form method="post" action="savetask.php?eid='.$eventId.'&tid='.$taskId.'"><table border="0">';
					if (! $res=mysqli_query($conId, $sel_sql)) 
					{
						echo mysqli_error($conId);
						exit;
					}
					else 
					{
						while($tasklistarr = mysqli_fetch_assoc($res))
						{
							
							echo '<tr><td>Task name:</td><td><input type="text" name="tname" value="'.strip_tags(stripslashes(ucfirst($tasklistarr["t_name"]))).'" required/></td></tr>';
							echo '<tr><td>Task description:</td><td><input type="text" name="tdesc" value="'.strip_tags(stripslashes(ucfirst($tasklistarr["t_desc"]))).'" /></td></tr>';
							echo '<tr><td>Task Due date:</td><td><input type="date" name="tdue" value="'.ucfirst($tasklistarr["t_duedate"]).'" /></td></tr>';
							echo '<tr><td>Task Approx Price:</td><td><input type="number" name="tappprice" value="'.ucfirst($tasklistarr["t_approxprice"]).'" /></td></tr>';
							echo '<tr><td>Helper Name:</td><td><input type="text" name="hname" value="'.strip_tags(stripslashes(ucfirst($tasklistarr["t_helper_name"]))).'"  /></td></tr>';
							echo '<tr><td>helper Email:</td><td><input type="email" name="hemail" value="'.strip_tags(stripslashes(ucfirst($tasklistarr["t_helper_email"]))).'" /></td></tr>';
							echo '<tr><td><input type="submit" class="buttonCSS" value="Save" /></form></td></tr>';
						}
					}
					echo "</table>";
				?>
			</div>
		</div>
		<div class="occasionListBg">
			<section style="height:40px;" class="center" style="font-size:12px;" align="center">
				<label style="color:#ccc;"><br>Copyright &copy; at NoStressCelebration Occasion Celebration Planner</label>
			</section>
		</div>
	</body>
</html>


			<?php	/*.$tasklistarr["t_id"].'" type="text" value="'.ucfirst($tasklistarr["t_name"]).'" disabled /></label></td>
							<td class="subText" style="width:15%"><input class="labelTreat" id="due'.$tasklistarr["t_id"].'" name="due'.$tasklistarr["t_id"].'" type="text" value="'.$tasklistarr["t_duedate"].'" disabled /></label></td>
							<td class="subText" style="width:15%"><input class="labelTreat" id="approx'.$tasklistarr["t_id"].'" name="approx'.$tasklistarr["t_id"].'" type="text" value="'.$tasklistarr["t_approxprice"].'" disabled /></label></td>';	
							if($tasklistarr["t_actualprice"] == NUll)
								echo '<td class="subText" style="width:15%"><!--<input id="actual'.$tasklistarr["t_id"].'" name="actual'.$tasklistarr["t_id"].'" type="text" />--></td>';
							else
								echo '<td class="subText" style="width:15%"><input id="actual'.$tasklistarr["t_id"].'" name="actual'.$tasklistarr["t_id"].'" type="text" value="'.$tasklistarr["t_actualprice"].'" disabled /></label></td>';
					echo		'<td><form action="edittodo.php?tid='.$tasklistarr["t_id"].'&eid='.$eventid.'" method="post">
									<input type="submit" class="" value="Edit" /></a></form></td>
								 <td><form action="delete.php?tid='.$tasklistarr["t_id"].'&eid='.$eventid.'">
									<input type="submit" class="" value="Delete" /></a></form></td>';
						echo '</tr>';
						echo '<tr><td colspan="6">Description:'.$tasklistarr["t_desc"].'</td></tr>';
						if($tasklistarr["t_helper_flag"] == "Y")
						{
							echo '<tr><td colspan="6">Helper:'.$tasklistarr["t_helper_email"].'</td></tr>';
							echo '<tr><td colspan="6">id:'.$tasklistarr["t_id"].'</td></tr>';
							echo '<tr><td colspan="6"><form action="sendmail.php?help=1" method="post"><input type="text" style="display:none" name="helperemail" value="'.$tasklistarr["t_helper_email"].'" /><input type="text" name="helpername" style="display:none" value="'.$tasklistarr["t_helper_name"].'" /><input type="text" name="useremail" style="display:none" value="'.$useremail.'" /><input type="text" name="username" style="display:none" value="'.$username.'" /><input type="text" style="display:none" name="evid" value="'.$eventid.'" /><input type="submit" class="" value="Send Email To Helper" /></a></form></td></tr>';
						}
						echo '<tr><td colspan="6"><hr></td></tr>';
				}
				echo '</table>';
				echo '<br><br><input type="button" class="buttonCss" value="Add More ToDo list" onclick="showHideSections(\'createToDo\',\'showAllToDo\')" />';
				echo '<br><br></section>';
			}
		}	*/?>