<?php 
	session_start();
	$userid = $_SESSION["userid"];
	$inviteid = $_REQUEST["iid"];
	echo $userid;
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
			<?php include("/templatemainframe/headerLogoLinks.html"); ?>
		</div>
		<div class="occasionListBg">
			<?php include("/templatemainframe/eventlinks.php"); ?>
		</div>
		<div style="width:80%;" class="center">
			<div id="toDoListLinkContent" style="background-color:#e9dfc6;">
				<form action="ab.php?lid=<?php echo $inviteid ?>" method="POST">
					<section>
						<?php showgreeting($db, $conId ,$inviteid) ?>
					</section>
					<section>
						<?php include ("cust.html"); ?>
					</section>
				</form>
			</div>
		</div>
		<div class="occasionListBg">
			<section style="height:40px;" class="center" style="font-size:12px;" align="center">
				<label style="color:#ccc;"><br>Copyright &copy; at NoStressCelebration Occasion Celebration Planner</label>
			</section>
		</div>
	</body>
	<?php function showgreeting($dbname, $conId, $inviteid)
	{
		//echo $ename;
		
		$sel_sql = "select * from ".$dbname.".invite_tbl where i_id=".$inviteid.";";
		
		if (! $res=mysqli_query($conId, $sel_sql)) 
		{
			echo mysqli_error($conId);
			exit;
		}
		else 
		{
			
				while($greeting = mysqli_fetch_assoc($res))
				{
					
					echo '<label name="myDesign">'.$greeting["i_desc"].'</label>';	
				}
				
		}
	}	
	?>
</html>