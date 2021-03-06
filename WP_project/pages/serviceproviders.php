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
		<div class="logoBg">
			<?php include("/headerLogoLinks.html"); ?>
		</div>
		<div class="occasionListBg">
			<?php include("/occasionLinks.php"); ?>
		</div>
		<div style="width:80%;" class="center">
			<div id="toDoListLinkContent" style="width:25%;height:400px" >
					<?php include("activityList.php"); ?>
			</div>
			<div id="toDoListContent" style="width:73%;height:600px;margin-left:-3px" >
				<form id="toDoListform" action="todolist_process.php" method="POST" class="subHeading" style="width:90%;margin-left:10px;font-size:18px">
					<label class="mainHeading">List of Service providers</label><hr>
					<section style="width:95%;height:200px;margin-left:10px">
						<img src="../images/food.png" style="width:32%;"  />
						<img src="../images/venue.png" style="width:32%;margin-left:10px"/><img src="../images/tg.png" style="width:32%;margin-left:10px"/><br>
						<a href="SPDetailsPage.php" class="center" style="width:32%">Khasiyat</a><a href="#"  style="width:32%;margin-left:170px" class="center">Bombay Talk</a>
						<a href="#" style="width:32%;margin-left:120px" class="center">Rasoi</a>
						<a href="#" style="margin-left:500px">View All Food Services</a>
					</section>
					<hr>
					<section style="width:95%;margin-left:10px">
						<img src="../images/photo.png" style="width:32%;"  /><img src="../images/photo.png" style="width:32%;margin-left:10px"/><img src="../images/photo.png" style="width:32%;margin-left:10px"/><br>
						<a href="#" style="margin-left:500px">View All Photo Services</a>
					</section>
				</form>
			</div>
		</div>
	</body>
</html>