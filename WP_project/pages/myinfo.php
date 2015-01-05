<?php 
	session_start();

		if(isset($_SESSION["userid"]))
			$userId = $_SESSION["userid"];
		elseif(isset($_SESSION["sid"]))
			$spId = $_SESSION["sid"];
		else	
		{
			echo "Please login.";
			exit;
		}
		include("dbWrapper.php");
		$conId=connect_toDB();
?>
<!DOCTYPE HTML>
	<head>
		<title>NostressCelebration Event Planners</title>
		<link href="../css/style.css" type="text/css" rel="stylesheet" />
		<script src="../js/functions.js" type="text/javascript" ></script>
		<link href='http://fonts.googleapis.com/css?family=Dancing+Script' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Satisfy' rel='stylesheet' type='text/css'>
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
					if(($_REQUEST["ut"]) == "u")
						include ("userprofileinfo.php");
					elseif(($_REQUEST["ut"]) == "sp")
						include ("serviceproviderprofileinfo.php");
					else
						echo "";
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
disconnect($conId);
?>