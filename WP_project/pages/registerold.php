<!DOCTYPE HTML>
	<head>
		<title>NostressCelebration Event Planners</title>
		<link href="../css/style.css" type="text/css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Dancing+Script' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Tangerine' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Satisfy' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Zeyada' rel='stylesheet' type='text/css'>
		<style>
			td{
				
				height:33px;
			}
			@media screen and (max-width: 600px) {
			table,
			tbody {
				display: block;
				width: 100%;
			}
			 table tr,
			table th,
			table td {
					display: block;
					padding: 0;
					text-align: left;
					white-space: normal;
				}
		</style>
	</head>
	<body>
		<div class="logoBg">
			<?php include("/headerLogoLinks.html"); ?>
		</div>
		<div class="occasionListBg">
			<?php include("/occasionLinks.php"); ?>
		</div>
		<div>
			<section class="center" style="margin-top:10px">
				<section class="curvedRectBoxes center" style="width:100%;height:auto;display:inline-block;vertical-align:top;text-align:left;margin-left:0px;">	
					<label><span class="mainHeading">User Register Form</span></label><hr>
					
					<nav id="navListHeader">
							<a href="SPRegister.php"> Service Provider? Register Here </a>
					</nav>
					
					<form action="userRegister_script.php" method="POST" style="width:100%;text-align:left;margin-left:0px;margin-top:0px">
						<table align="center" width="600px">
						<thead>
						</thead>
						<tbody>
						<br>
						<tr>	
							<td style="width:170px;"valign="top">
								<label class="subHeading" style="margin-left:10px"> First Name* </label>
							</td>
							<td valign="top">
								<input type="text" name="fnameTxt" maxlength="100" size="25" placeholder="Enter First Name"  required/>
							</td>
						</tr>
						<tr>	
							<td valign="top">
								<label class="subHeading" style="margin-left:10px"> Last Name </label>
							</td>
							<td valign="top">
								<input type="text" name="lnameTxt" maxlength="100" size="25" placeholder="Enter Last Name"  required/>
							</td>
						</tr>
						<tr>	
							<td valign="top">
								<label class="subHeading" style="margin-left:10px"> Email * </label>
							</td>
							<td valign="top">
								<input type="email" name="emailTxt" maxlength="100" size="25" placeholder="Enter Email Address"  required/>
							</td>
						</tr>
						<tr>	
							<td valign="top">
								<label class="subHeading" style="margin-left:10px"> Password * </label>
							</td>
							<td valign="top">
								<input type="password" name="passTxt" maxlength="100" size="25" placeholder="Enter Password"  required/>
								<!--<img src="tooltip.gif" title= "Password must contains minimum 8 characters"> </img>
							--></td>
						</tr>
						<tr>	
							<td valign="top">
								<label class="subHeading" style="margin-left:10px"> Re-enter Password * </label>
							</td>
							<td valign="top">
								<input type="password" name="repassTxt" maxlength="100" size="25" placeholder="Re-Enter Password"  required/>
								<!--<img src="tooltip.gif" title= "Password must contains minimum 8 characters"> </img>
							--></td>
						</tr>
						<tr>	
							<td valign="top">
								<label class="subHeading" style="margin-left:10px"> Street </label>
							</td>
							<td valign="top">
								<input type="text" name="streetTxt" maxlength="100" size="25" placeholder="Enter Street Address"/>
							</td>
						</tr>
						<tr>	
							<td valign="top">
								<label class="subHeading" style="margin-left:10px"> City </label>
							</td>
							<td valign="top">
								<input type="text" name="cityTxt" maxlength="100" size="25" placeholder="Enter Name of Your City"/>
							</td>
						</tr>
						<tr>	
							<td valign="top">
								<label class="subHeading" style="margin-left:10px"> State </label>
							</td>
							<td valign="top">
								<input type="text" name="stateTxt" maxlength="100" size="25" placeholder="Enter Name of Your State"/>
							</td>
						</tr>
						<tr>	
							<td valign="top">
								<label class="subHeading" style="margin-left:10px"> Zipcode * </label>
							</td>
							<td valign="top">
								<input type="text" name="zipTxt" maxlength="100" size="25" placeholder="Enter Zipcode" required/>
							</td>
						</tr>
						<tr>	
							<td valign="top">
								<label class="subHeading" style="margin-left:10px"> Contact  </label>
							</td>
							<td valign="top">
								<input type="text" name="contactTxt" maxlength="100" size="25" placeholder="Enter Contact no" />
							</td>
						</tr>
						</tbody>
						</table>
						<input align="center" type="submit" name="submitBtn" class="button" Value="Submit" style="margin-left:255px;"/> <br> <br> <br>
					</form>
				</section> 
			
			</section>
		</div>
		<div>
			<br>
		</div>
		<div class="occasionListBg">
			<section style="height:40px;" class="center" style="font-size:12px;" align="center">
				<label style="color:#ccc;"><br>Copyright &copy; at NoStressCelebration Ocassion Celebration Planner</label>
			</section>
		</div>
	</body>
</html>