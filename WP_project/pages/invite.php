<?php 
	session_start();
	$userid = $_SESSION["userid"];
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
		
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

		<script>
		</script>
	</head>
	<body>
		<?php //$eventId = $_REQUEST["eid"]; ?>
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
				<div style= "font-family:arial,serif;font-size:14px;margin-left:10%;margin-top:5%;" >  	
					<input class="subText" type="radio" name="cardchoice" value="Y" onclick="showHideSections('cust','own')" checked="checked"/> Select Custom Invite
					<input class="subText" type="radio" value="N" name="cardchoice" onclick="showHideSections('own','cust')"/> Select Own Invite <br><br>
				</div>
				<section id="cust">
						<?php 
							customInvitation($conId ,$eventId);
						?>
				</section>
				<section id="own" style="display:none">
							<center>
							<div style="width:50%;margin-top:3%">
							<form enctype="multipart/form-data" method="post">
								<input name="upfile" type="file" >
								<input type="submit" name="submit" value="upload"><br><br><br>
								<p style="font-family:arial,serif;font-size:14px;color:red"> The permitted file types are:jpg | jpeg | png | gif <br><br>
								
							</form> 
							</div>
							</center>
							<?php 
								ownInvitation($conId, $userid,$eventId);
							?>
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
		function customInvitation($conId, $eventid)
		{
			$sel_sql = "select * from invite_tbl where e_id='$eventid'";
			
			if (!$res=mysqli_query($conId, $sel_sql)) 
			{
				echo mysqli_error($conId);
				exit;
			}
			else 
			{
				echo '<table cellspacing="1" cellpadding="1" border="0" style="width:80%;margin:10px">';
				echo '<tr><th><center></center></th><th></th><th></th><th></th>';
				$i = 0;
				while($greeting = mysqli_fetch_assoc($res))
				{
					if(($i % 4) == 0)
					echo '</tr><tr>';
					echo '<td class="subText"><a href="customize_invite.php?iid='.$greeting['i_id'].'&eid='.$eventid.'"><img src="data:image/jpeg;base64,' . base64_encode($greeting['i_thumb']).'" width="250px" height="150px"></a></td>';
					$i++;		
				}
				echo '<tr><td><a href="selectInvitation.php?eid='.$eventid.'">Preview</a></td></tr></table>';
			}
		}	

		function ownInvitation($conId, $userid, $eventid)
		{	
			$uptypes=array('image/jpg','image/jpeg','image/png','image/gif');
			$max_file_size=5000000;   
			$dirname = $userid;  // Change it with userid //
			$destination_folder="../images/";
			$imgpreview=1;    
			$imgpreviewsize=1/2;   
			if (isset($_POST['submit']) && isset($_FILES['upfile']))
			{
				if (!is_uploaded_file($_FILES["upfile"]["tmp_name"]))
				{
					echo '<center> <font style="font-family:arial,serif;font-size:14px;color:red">The file is not existed!</font></center>';
					exit;
				}

				$file = $_FILES["upfile"];
				
				if($max_file_size < $file["size"])
				{
					echo '<center> <font style="font-family:arial,serif;font-size:14px;color:red">The file is too large!</font>';
					exit;
				}
				
				if(!in_array($file["type"], $uptypes))
				{
					echo '<center><font style="font-family:arial,serif;font-size:14px;color:red">Only pitcure files can be uploaded!</font>';
					exit;
				}
			
				if(!file_exists($destination_folder.$dirname))
				{
					mkdir($destination_folder.$dirname);
				}
			
				$filename=$file["tmp_name"];
				$image_size = getimagesize($filename);
				$pinfo=pathinfo($file["name"]);
				$ftype=$pinfo["extension"];
				$destination= $destination_folder.$dirname."/".$file["name"];
				echo '<center><font style="font-family:arial,serif;font-size:14px;"> Destination path is "'.$destination.'"</font></center>';
				if (file_exists($destination)) 
				{
					echo '<center> <font style="font-family:arial,serif;font-size:14px;color:red">There is file with the same name!</a>';
					exit;
				}
			
				if(!move_uploaded_file ($filename, $destination))
				{
					echo '<center> <font style="font-family:arial,serif;font-size:14px;color:red">Error occur when move the file!</a>';
					exit;
				}
			
				$pinfo=pathinfo($destination);
				$fname=$pinfo["basename"];
				echo "<center>";
				echo "<div>"; 
				echo '<font style="font-family:arial,serif;font-size:14px;color:red">Upload successfully</font><br><font style="font-family:arial,serif;font-size:14px"> File name: </font> <font style="font-family:arial,serif;font-size:14px;color:blue">"'.$destination.'"</font><br>';
				echo '<font style="font-family:arial,serif;font-size:14px;color:red">width:'.$image_size[0];
				echo " length:".$image_size[1];
			
				echo "<br>Pitcure preview:<br>";
				echo "<a href=\"".$destination."\"target='_blank'><img src=\"".$destination."\" width=".($image_size[0]*$imgpreviewsize)." height=".($image_size[1]*$imgpreviewsize);
			
				echo "</br></br></br></br>";
				echo "</div>";
				echo "</center>";
				$sel_sql = "select u_id, e_id FROM user_event_tbl where u_id='$userid' and e_id='$eventid'";
				if (!$res=mysqli_query($conId, $sel_sql)) 
					{
						echo mysqli_error($conId);
						exit;
					}
				else{
					if((mysqli_num_rows ($res) < 1))
					{	 	
						echo " NO rows in database ";
						$ins_sql = "insert into user_event_tbl(u_id,e_id) VALUES ('".$userid."','".$eventid."');";
						echo "query===".$ins_sql;
						if(!$res = mysqli_query ($conId, $ins_sql))
						{
							echo mysqli_error($conId);
							exit;
						}
						else
						{
							echo "Insert successfully";
						} 
					}
					else
					{						
						$update_img = "update user_event_tbl SET cust_invite=NULL ,own_invite='".$destination."' WHERE u_id='".$userid."' AND e_id='".$eventid."';";
						if(!$res = mysqli_query ($conId, $update_img))
						{
							echo mysqli_error($conId);
							exit;
						}
						else
						{
							echo "updated successfully";
						}
					}
				}
				
			}
		}
		
		
		
	?>
	
	
</html>