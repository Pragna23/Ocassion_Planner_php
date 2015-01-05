<?php 
	session_start();
	$userId = $_SESSION["userid"];
	echo "user==".$userId;
	$edit = $_REQUEST["edit"];
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
			<div id="sectionContent">
				<?php showmyprofileinfo($conId, $userId);?>
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
function showmyprofileinfo($conId, $uid)
{
	$infoSection = '<section id="myProfileInfo" class="subText">';
	
	$sel_sql = "select u_first_name,u_last_name,u_street,u_city,u_state,u_zip,u_contact from userinfo_tbl where u_id=".$uid.";";
	
	if (! $res=mysqli_query($conId, $sel_sql)) 
	{
		echo mysqli_error($conId);
		exit;
	}
	else 
	{
		if(mysqli_num_rows($res) == 0)
		{
			$infoSection .= '<label>Sorry No user information found.</label>';
		}
		else
		{
			$replaceCharList = array("u_","_");
			$replaceCharListfordiv = array(" ");
			$userinfoArr = mysqli_fetch_assoc($res);
			
			$uname = $userinfoArr["u_first_name"]." ".$userinfoArr["u_last_name"];
			$infoSection .= '<label class="mainHeading">Welcome, '.ucwords($uname).'</label><hr>';
			
			$infoSection .=	'<form action="editinfo.php?edit=1" method="post"><table  id="myProfileInfoTbl" cellspacing="0" cellpadding="0" border="0" style="width:60%;margin:10px">';
			
			foreach($userinfoArr as $key => $elem)
			{
				$infoSection .= '<tr>
						<td style="width:20%;text-align:left"><label>'.ucwords(str_replace($replaceCharList," ",$key)).':</label></td>
						<td style="width:80%"><input class="labelTreat" type="text" id="'.str_replace($replaceCharListfordiv," ",$key).'" id="'.str_replace($replaceCharListfordiv," ",$key).'" value="'.$elem.'" width="100" disabled /></td>
					 </tr>';
			}
			
		}
		$infoSection .= '		<tr><td><input type="submit" class="buttonCSS" value="Edit" /></td></tr>
							</table></form>
						</section>';	
		echo $infoSection;
	}		
}
?>