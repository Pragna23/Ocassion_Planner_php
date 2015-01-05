<?php 
	session_start();
	if(isset($_SESSION["userid"]))
		$userId = $_SESSION["userid"];
	include("dbWrapper.php");
	$conId=connect_toDB();
?>
<!DOCTYPE HTML>
	<head>
		<title>NostressCelebration Event Planners</title>
		<link href="../css/style.css" type="text/css" rel="stylesheet" />
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
		<div style="width:80%;" class="center">
			<div id="toDoListLinkContent" style="background-color:#e9dfc6;color:#000">
			<label class="mainHeading"> User Reviews </label><hr>
			<section style="width:90%" class="center">
			<?php
				$sel_sql = "select * from ".$db.".review_tbl";
		
				if (! $res=mysqli_query($conId, $sel_sql)) 
				{
					echo mysqli_error($conId);
					exit;
				}
				else 
				{
					if(mysqli_num_rows($res) == 0)
					{
						echo '<label class="subText" style="margin-top:20px">We are sorry, but we do not have any reviews available yet.</label>';
					}
					else
					{
						while($reviewArr = mysqli_fetch_assoc($res))
						{
							$sel_sql1 = 'select * from '.$db.'.userinfo_tbl where u_id='.$reviewArr["u_id"].';';
							if (! $res1=mysqli_query($conId, $sel_sql1)) 
							{
								echo mysqli_error($conId);
								exit;
							}
							else 
							{
								$uinfo = mysqli_fetch_assoc($res1);
							}
							echo '<p class="subText">'.$reviewArr["r_content"].'<br><label class="subHeading">By:'.$uinfo["u_first_name"].'</label><label class="subHeading" style="margin-left:40px">Ratings: '.$reviewArr["r_rating"].'/ 5</label></p><hr>';
						}
					}
				}
			?>
			</section>
			</div>
		</div>
		<div><br></div>
		<div class="occasionListBg">
			<section style="height:40px;" class="center" style="font-size:12px;" align="center">
				<label style="color:#ccc;"><br>Copyright &copy; at NoStressCelebration Occasion Celebration Planner</label>
			</section>
		</div>
	</body>
</html>