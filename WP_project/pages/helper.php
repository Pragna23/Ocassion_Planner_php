<?php 
	session_start();
	$eventId = " ";
	if(isset($_SESSION["userid"]))
		$userId = $_SESSION["userid"];
	
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
		<?php 
			if(isset($_REQUEST["eid"]))
			$eventId = $_REQUEST["eid"]; 
		?>
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
				<br>
				<label class="mainHeading">My Helper Responsibilities</label><hr>
				<?php
					$hEmail = findemailaddress($conId,$userId);
					searchforassignedtasks($conId,stripslashes($hEmail));
				?>
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
</html>	
<?php
function findemailaddress($conId, $uid)
{

	$sel_sql = 'select u_email from userinfo_tbl where u_id='.$uid;
	
	if (! $res=mysqli_query($conId, $sel_sql)) 
	{
		echo mysqli_error($conId);
		exit;
	}
	else 
	{
		$uinforr = mysqli_fetch_array($res);
		return $uinforr["u_email"];
	}
}
function searchforassignedtasks($conId, $hemail)
{

	$sel_sql = 'select u_id,e_id,t_name,t_desc,t_duedate,t_approxprice from todolist_tbl where t_helper_email="'.stripslashes($hemail).'"';
	
	$tHTML = '<table cellspacing="0" cellpadding="0" border="0" style="width:80%;margin:10px">';
	if (! $res=mysqli_query($conId, $sel_sql)) 
	{
		echo mysqli_error($conId);
		exit;
	}
	else 
	{
		while($helpertasksrr = mysqli_fetch_assoc($res))
		{
			
			// '<tr>';
			$tHTML .= '<tr><td style="width:40%"><label>'.stripslashes($helpertasksrr["t_name"]).'</label></td><td style="width:30%"><label>'.$helpertasksrr["t_duedate"].'</label></td>
						<td style="width:30%"><label>'.$helpertasksrr["t_approxprice"].'</label></td></tr>';
			$tHTML .= '<tr><td colspan="3"><label>'.stripslashes($helpertasksrr["t_desc"]).'</label></td></tr>';
			
			$uinfo_sql = 'select u_first_name,u_last_name,u_email from userinfo_tbl where u_id='.$helpertasksrr["u_id"];
	
			if (! $res1 = mysqli_query($conId, $uinfo_sql)) 
			{
				echo mysqli_error($conId);
				exit;
			}
			else 
			{
				$hassigneearr = mysqli_fetch_assoc($res1);
				$tHTML .= '<tr><td colspan="3"><label>Assigned By:</label><label>'.stripslashes($hassigneearr["u_first_name"]).'</label></td></tr>';
				$tHTML .= '<tr><td colspan="3"><hr></td></tr>';
			}
		}
	}
	$tHTML .= '</table>';
	echo $tHTML;
}
?>		
		
