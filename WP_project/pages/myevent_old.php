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
		<?php $eventId = $_REQUEST["eid"]; ?>
		<div class="logoBg">	
			<?php include("headerLogoLinks.html"); ?>
		</div>
		<div class="occasionListBg">
			<?php include("/templatemainframe/eventlinks.php"); ?>
		</div>
		<div style="width:80%;" class="center">
			<div id="toDoListLinkContent" style="width:25%;height:400px" >
				<?php include("/templatemainframe/eventsublinks.php"); ?>
			</div>
			<div id="toDoListContent" style="width:73%;height:450px;margin-left:-3px" >
				<form id="toDoListform" action="createtodo.php" method="POST" class="subHeading" style="width:90%;margin-left:10px;font-size:18px">
					<label class="mainHeading">To Do List</label><hr>
					<nav><ul>
					
					<section style="width:70%;display:inline-block">
						<li>Invite students</li>
					</section>
					<section style="width:29%;display:inline-block">
						<img src="../images/edit.png" /><img src="../images/delete.png" style="margin-left:15px" />
					</section>
					<hr>
					<section style="width:70%;display:inline-block">
						<li>Hire photographer</li><section style="font-size:16px;height:25px">Helper: xyz@yahoo.com </section>
					</section>
					<section style="width:29%;display:inline-block">
						<img src="../images/edit.png" /><img src="../images/delete.png" style="margin-left:15px"/>
					</section>
					<hr>
					<section style="width:70%;display:inline-block">
						<li>Arrange food</li><section style="font-size:16px;height:25px">Helper: user </section>
					</section>
					<section style="width:29%;display:inline-block">
						<img src="../images/edit.png" /><img src="../images/delete.png" style="margin-left:15px"/>
					</section>
					<input type="submit" class="button" value = "Add New Task" style="margin-left:0px">
				</div>
		</div>
	</body>
</html>