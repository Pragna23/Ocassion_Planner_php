<!DOCTYPE HTML>
	<head>
		<title>NostressCelebration Event Planners</title>
		<link href="../css/style.css" type="text/css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Dancing+Script' rel='stylesheet' type='text/css'>
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
			<div id="toDoListContent"  style="width:73%;height:450px;margin-left:-3px" >
				<form action="todo.php"  class="subHeading" method="POST" style="width:100%;text-align:left;margin-left:0px;margin-top:0px">
					<label class="mainHeading"> Create TO_dO List</label><hr>
					<label style="margin-left:10px">Task Name&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<input type="text" name="Task" maxlength="100" size="26" placeholder="" style="margin-top:15px" required/><br><br>
					<label class="subHeading" style="margin-left:10px">Task Description:&nbsp;</label>
					<input type ="text" name="Description" maxlength="200" size="26" required/<br><br><br>
    				<label class="subHeading" style="margin-left:10px">Task Due Date:</label>  &nbsp;&nbsp;&nbsp;
					<input type="Date" name="Date" maxlength="50" size="26" placeholder="" required/><br><br> 
    				<label class="SubHeading" style="margin-left:10px">Approx Price:&nbsp;	</label> &nbsp;&nbsp;&nbsp; &nbsp;
					<input type="Approx Price" name="maxlength="5" size="26" placeholder=""  required/><br><br>
    				<label class="SubHeading" style="margin-left:10px">Actual Price:&nbsp; </label> &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
					<input type="Actual Price" name="maxlength="5" size="26" placeholder=""  required/><br><br>
    					<label class="SubHeading" style="margin-left:10px">Want to add helper for this task?:&nbsp;</label>
					<input type="radio" name="helper_flag" value="Yes"><label>Yes</label>
					<input type="radio" name="helper_flag" value="No"><label>No</label><br/> </br>
    				<label class="SubHeading" style="margin-left:10px">Helper Name:&nbsp;</label> &nbsp;&nbsp;&nbsp;
					<input type="text" name="helper_email"maxlength="50" size="26" placeholder="" required/><br><br>
					<label class="SubHeading" style="margin-left:10px">Helper Email:&nbsp;</label> &nbsp;&nbsp;&nbsp;
					<input type="email" name="helper_email"maxlength="50" size="26" placeholder="" required/><br><br>
					<label class="SubHeading" style="margin-left:10px">Please select service access that you want to provide to helper:&nbsp;</label></br>
					<input type="checkbox" name="helper_service_access" value="Food" style="margin-left:10px"><label>Food &nbsp; </label>
    				<input type="checkbox" name="helper_service_access" value="Photo"><label>Photo &nbsp; </label>
    				<input type="checkbox" name="helper_service_access" value="Venue"><label>Venue &nbsp; </label></br></br>
					<input type="submit" name="SaveBtn" class="button" Value="Save"/>
					</form>
			</div>
		</div>
	</body>
</html>