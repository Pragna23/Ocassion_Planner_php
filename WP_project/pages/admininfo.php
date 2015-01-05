<?php 
	session_start();

		if(isset($_SESSION["aid"]))
			$adminId = $_SESSION["aid"];
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
			<div id="sectionContent">
				<?php
					//echo '<label class="mainHeading">Event Information</label><hr>';
					//include("EventAdmin.php"); 
					echo '<label class="mainHeading">Approve / Deny Service Provider Requests</label><hr>';
					checkfornewrequests($conId);
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
<?php
function checkfornewrequests($conId)
{
	$sel_sql = 'select s_id,sp_first_name, sp_last_name, c_contact, c_name, c_zip from serviceprovider_Tbl where sp_grant="N"';
	
	if (! $res=mysqli_query($conId, $sel_sql)) 
	{
		echo mysqli_error($conId);
		exit;
	}
	else 
	{
		$infoSection ="";
		$requireval = " "; $starval =" ";
		if(mysqli_num_rows($res) == 0)
		{
			$infoSection .= '<label class="mainHeading">No New Requests available.</label>';
		}
		else
		{
			
			while($newrequests = mysqli_fetch_assoc($res))
			{
				$faction = "grantaccess.php?spid=".$newrequests["s_id"];
				
				$infoSection .=	'<form action="'.$faction.'" method="post">
					<table><tr>
						<td>'.strip_tags(stripslashes($newrequests["sp_first_name"])).'<td><td>'.strip_tags(stripslashes($newrequests["sp_last_name"])).'</td><td>'.strip_tags(stripslashes($newrequests["c_contact"])).'</td><td>'.strip_tags(stripslashes($newrequests["c_name"])).'</td><td>'.strip_tags(stripslashes($newrequests["c_zip"])).'</td><td><input class="subText" type="radio" name="granta" value="Y">Yes<input class="subText" type="radio" value="N" name="granta" checked>No</td></tr><td><input type="submit" class="buttonCSS"  value = "Submit"/></td></tr></table></form>';
			}
		}
		echo $infoSection;
	}		
}
/*
function saveUserProfileInfo($conId, $uid)
{
	$sqlQuery = 'update userinfo_tbl SET
					u_first_name = "'.$_REQUEST["u_first_name"].'", u_last_name ="'.$_REQUEST["u_last_name"].'", u_street ="'.$_REQUEST["u_street"].'",u_city ="'.$_REQUEST["u_city"].'",u_state = "'.$_REQUEST["u_state"].'",u_zip ="'.$_REQUEST["u_zip"].'",u_contact = "'.$_REQUEST["u_contact"].'" where u_id='.$uid;
	
	if (! $res=mysqli_query($conId, $sqlQuery)) 
		{
			echo mysqli_error($conId);
			exit;
		}
		else 
		{
			header('Location:myinfo.php');
			
		}
}
*/
?>