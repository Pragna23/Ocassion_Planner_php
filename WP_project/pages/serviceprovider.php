<?php
session_start();
$userId = $_SESSION["userid"];
include("dbWrapper.php");
$conId=connect_toDB();
if(isset($_REQUEST["sid"]))
{
	$serviceId	 = $_REQUEST["sid"];
}
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
		<div class="occasionListBg">
			<?php include("/templatemainframe/eventlinks.php"); ?>
		</div>
		<div style="width:80%;" class="center">
			<div id="toDoListLinkContent" style="background-color:#e9dfc6">
				<section style="width:96%;margin-left:10px;margin-top:20px">
					<label class="mainHeading">Service Provider Details</label><hr>
					<section>
						<?php fetchServicedetails($conId, $serviceId); ?>
					</section>
			</div>
		</div>
	</body>
	<?php function fetchServicedetails($conId, $serviceid)
	{
		//echo $ename;
		
		$sel_sql = "select * from serviceprovider_tbl where s_id='".$serviceid."';";
		
		if (! $res=mysqli_query($conId, $sel_sql)) 
		{
			echo mysqli_error($conId);
			exit;
		}
		else 
		{
			$servicedetail = mysqli_fetch_array($res);
			echo '<section style="width:50%;display:inline-block;vertical-align:top">';
			echo '<label class="subText">Name: '.stripslashes(strip_tags($servicedetail["c_name"])).'</label><br>';
			echo '<label class="subText">Category: '.stripslashes(strip_tags($servicedetail["s_category"])).'</label><br>';
			echo '<label class="subText">Service Provider\'s Name: '.stripslashes(strip_tags($servicedetail["sp_first_name"])).stripslashes(strip_tags($servicedetail["sp_last_name"])).'</label><br>';
			echo '<label class="subText">Address: '.stripslashes(strip_tags($servicedetail["c_street"])).','.stripslashes(strip_tags($servicedetail["c_city"])).','.stripslashes(strip_tags($servicedetail["c_state"])).' '.stripslashes(strip_tags($servicedetail["c_zip"])).'</label><br>';
			echo '<label class="subText">Contact: '.stripslashes(strip_tags($servicedetail["c_contact"])).'</label><br>
			<label class="mainHeading"><hr>Contact Service provider</label>
				<form action="sendmail.php?send=servicesend" method="post" style="margin-left:30px;margin-top:20px; vertical-align:top">
					<label class="subText">Your Name:</label>
					<input name="name" width="100" placeholder="Enter your name" style="width:300px" required/>
					<br><br>
					<label class="subText">Your Email:</label>
					<input name="email" type="email" placeholder="Enter your email" style="width:300px" required />
					<br><br>
					<label class="subText" style="vertical-align:top">Message:</label>&nbsp;&nbsp;&nbsp;&nbsp;
					<textarea name="message" placeholder="Enter message" style="width:300px;height:200px" required></textarea>
					<br><br>
					<input name= "spemail" value='.stripslashes($servicedetail["s_email"]).'" style="display:none" />
					<input name= "spname" value='.stripslashes($servicedetail["sp_first_name"]).'" style="display:none" />
					<input id="submit" name="submit" type="submit"  class="buttonCss" value="Submit" style="margin-left:150px">
				</form>
			</section>';
			echo '<section style="width:50%;display:inline-block">';
			$Address = stripslashes($servicedetail["c_street"]).",".stripslashes($servicedetail["c_city"]).",".stripslashes($servicedetail["c_state"])." ".$servicedetail["c_zip"];
			$Address = stripslashes(strip_tags($Address));
			include("maaap.php");
			echo '</section>';
		
		}	
	}
	?>
</html>