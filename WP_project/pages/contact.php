<?php
session_start();
if(isset($_SESSION["userid"]))
	$userId = $_SESSION["userid"];
elseif(isset($_SESSION["sid"]))
	$spId = $_SESSION["sid"];
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
		
		<div style="width:80%;border-radius:10px;margin-top:10px;" class="center">
			<div id="toDoListLinkContent" style="background-color:#e9dfc6;min-height:500px;margin:0px;vertical-align:top;color:#000">
				<label class="mainHeading">Contact Us</label><hr><br><br>
				<?php include("contact.html");  ?>
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
