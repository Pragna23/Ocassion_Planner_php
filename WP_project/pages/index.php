<?php
if(isset($_SESSION["userid"]))
	$userId = $_SESSION["userid"];
elseif(isset($_SESSION["sid"]))
	$spId = $_SESSION["sid"];
?>
<!DOCTYPE HTML>
	<head>
		<title>NostressCelebration Event Planners</title>
		<link href="../css/style.css" type="text/css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<div class="logoBg"> 
			<?php include("/templatemainframe/headerLogoLinks.php"); ?>
		</div>
		<div>	
			<section style="height:270px;" class="center">
				<section id="signInContent" style="width:30%;">
					<?php include("/signInForm.html"); ?>
				</section> 
				<section id="bannerContent" >
					<img src="../images/banner.png" style="width:100%;height:260px;border-radius:5px;" />
				</section> 
			</section>
		</div>
		<div>
			<section class="center">
				<section style="width:70%;display:inline-block;vertical-align:top;" align="left">
					<section id="aboutContent">
						<label class="mainHeading">About Us</label><hr>
						<label class="subHeading"><p style="width:97%;margin-left:10px">NoStressCelebration is our effort to create a celebration planner that will allow you to perform all tasks required to host an successful event.Hosting a successful event is sometimes a stressful task and you feel like having an extra hands to perform multiple tasks. As name implies, NoStressCelebrtion planner will help you to organize a successful event with out any stress as it is easy to use and gives you a way to organize an event with "No Stress!"</p></label>
					</section>
					<section id="partyIdeaContent">
						<label class="mainHeading">Party Ideas</label><hr>
						<section class="partyIdeaPics">
							<a href="partyideas.php"><img src="../images/food.png" /></a>
							<a href="partyideas.php"><img src="../images/venue.png"/></a>
							<a href="partyideas.php"><img src="../images/party.png" /></a>
						</section>
						<section class="partyIdeaPics">
							<a href="partyideas.php"><img src="../images/venue.png" /></a>
							<a href="partyideas.php"><img src="../images/tg.png" /></a>
							<a href="partyideas.php"><img src="../images/food.png" /></a>
						</section>
					</section>
				</section> 
			
				<section id="ourServicesContent" class="subHeading" align="right" >
					<label><span class="mainHeading">Services</span></label><hr>
					<section class="ourServices">
						<label>Create To-do list</label><br>
						<p>Create To-do List and specify helpers that can help you with assigned tasks to perform your event.</p>
					</section>
					<hr style="margin-top:10px;">
					<section class="ourServices">
						<label>Customize Invitations</label><br>
						<p>Create invitations for your events or upload your own invitation to inform guests about your event details.</p>
					</section>
					<hr style="margin-top:10px;">
					<section class="ourServices">
						<label>Invite Guests</label>
						<p>Create guests and invite them to the event.</p>
					</section>
					<hr style="margin-top:10px;">
					<section class="ourServices">
						<label>Book Services for the event</label><p>You can book services such as food, photography or venue from our sites.</p>
					</section>
				</section>	
					
			</section>
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