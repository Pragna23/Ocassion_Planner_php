<?php 
	session_start();
	$userid = $_SESSION["userid"];
	$eventId = $_REQUEST["eid"];
	//global $eventId,$Inv_id;
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	$eventId = "1";
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
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script type="text/javascript" src="//code.jquery.com/jquery-2.1.0.min.js"></script>
		<script>
			$(document).ready(function(){
				$('#greetingdiv').submit(function(){
					var msg = $('#main').html();
					//alert (msg);
				var datastr = 'divmsg=' + msg 	;
				//alert(datastr);
				alert("datastr =" + datastr);
				if(msg==' ')
				{
					alert ("chill");
				}
				else
				{
				$.ajax({ 
				type : "POST",
				url : "insertInvite.php",
				data : datastr,
				cache : false,
				success: function(data) {
				//alert("success" + data );
				alert(data);
				} 
				});
			    }
				return false;
			});
		});
		
		</script>
	</head>
	<body>
		<?php 
			if(isset($_GET['iid']))
			{
				$Inv_id = $_GET['iid'];
				//echo "Invitation id =".$Inv_id;
			}
		?>
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
			
				  <div id = "main">
						<?php
							GetInviteId($conId, $Inv_id, $eventId);		
						?>
				  </div>
							
				<section class="curvedRectBoxes" style="width:100%;height:auto;display:inline-block;vertical-align:top;" >
					<?php include("/inviteform.html"); ?>
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
	function GetInviteId ($conId, $Inv_id, $eventid)
	{
		$sel_sql = "select i_desc,e_id from invite_tbl where i_id=".$Inv_id.";";
			//echo $sel_sql;
			if (!$res=mysqli_query($conId, $sel_sql)) 
			{
				echo mysqli_error($conId);
				exit;
			}
			else
			{
				while($icards = mysqli_fetch_assoc($res)){
					echo "$icards[i_desc]"."~"."$icards[e_id]";
				}
			}
	}
	?>	
</html>