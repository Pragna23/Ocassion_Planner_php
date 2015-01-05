<?php 
	include("dbWrapper.php");
	$conId=connect_toDB();
?>
<!DOCTYPE HTML>
	<head>
		<title>NostressCelebration Event Planners</title>
		<link href="../css/style.css" type="text/css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Dancing+Script' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Tangerine' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Satisfy' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Zeyada' rel='stylesheet' type='text/css'>
	 <script type="text/javascript">
           function validateForm()
           {
                //Check for HTML Tags 
				
				var email = document.userregister.emailTxt.value;
				var pass = document.userregister.passTxt.value;
				
				//var email_regx =/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,4}/;
				//var email_regx =/^[0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,4}$/;
				var email_regx =/^[0-9a-zA-Z]+[._]?[0-9a-zA-Z]+@[-0-9a-zA-Z._]+\.[a-zA-Z]{2,4}$/;
				var pass_regx = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])\w{6,}$/;
				var HTML_reg1=/<[^>\r\n]+>/gi;
				var HTML_reg2=/<[^>\r\n]+/gi;
				//var name_regx=/^[a-zA-Z]'?[-a-zA-Z]+$/;
				var name_regx=/^[a-zA-Z][-'a-zA-Z]+$/;
			
		if(document.userregister.fnameTxt.value.match(HTML_reg1) || document.userregister.lnameTxt.value.match(HTML_reg1) || document.userregister.emailTxt.value.match(HTML_reg1) || document.userregister.passTxt.value.match(HTML_reg1) || document.userregister.repassTxt.value.match(HTML_reg1) || document.userregister.streetTxt.value.match(HTML_reg1) || document.userregister.stateTxt.value.match(HTML_reg1) || document.userregister.cityTxt.value.match(HTML_reg1) || document.userregister.zipTxt.value.match(HTML_reg1) || document.userregister.contactTxt.value.match(HTML_reg1))
		{
			alert("HTML TAG found! Plaese check your input!");
			return false;
			
		}
      else if(document.userregister.fnameTxt.value.match(HTML_reg2) || document.userregister.lnameTxt.value.match(HTML_reg2) || document.userregister.emailTxt.value.match(HTML_reg2) || document.userregister.passTxt.value.match(HTML_reg2) || document.userregister.repassTxt.value.match(HTML_reg2) || document.userregister.streetTxt.value.match(HTML_reg2) || document.userregister.stateTxt.value.match(HTML_reg2) || document.userregister.cityTxt.value.match(HTML_reg2) || document.userregister.zipTxt.value.match(HTML_reg2) || document.userregister.contactTxt.value.match(HTML_reg2))
		{
			alert("HTML TAG found! Plaese check your input!");
			return false;
			
		}
		else if (!(document.userregister.fnameTxt.value.match(name_regx)))
		{
			alert("Incorrect First name");
			return false;
		}
		else if (!(document.userregister.lnameTxt.value.match(name_regx)))
		{
			alert("Incorrect last name");
			return false;
		}
        else if (!(email.match(email_regx)))
		{
			alert("Please enter Valid email address");
			return false;
		}
        else if(document.userregister.passTxt.value!=document.userregister.repassTxt.value)
        {
            alert("Passwords do not match!");
			return false;
        }
        else if (!(pass.match(pass_regx)))
		{
			alert("Incorrect password \n Password should have: \n 1)At least one number, one lowercase and one uppercase letter \n 2)At least six characters that are letters, numbers or the underscore");
			return false;
		}
            
		else
		{
			return true;
		}
    }
    </script>
	</head>
	<body>
		<?php //$eventId = $_REQUEST["eid"]; ?>
		<div class="logoBg">	
			<?php include("/templatemainframe/headerLogoLinks.html"); ?>
		</div>
		<div class="occasionListBg">
			<?php //include("/templatemainframe/eventlinks.php"); ?>
		</div>
		<div>
			<section class="center" style="margin-top:10px">
				<section class="curvedRectBoxes" style="width:70%;height:auto;align:center;display:inline-block;vertical-align:top;text-align:left;margin-left:160px;" align="center">
				<label class="mainHeading">User Registration Form</label><hr>
				<nav id="navListHeader">
					<a href="SPRegister.php"> Service Provider? Register Here </a>
				</nav>
				<form name= "userregister" action="userRegister_script.php" onsubmit="return validateForm()" method="POST" style="width:100%;text-align:left;margin-left:0px;margin-top:0px">
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
									<input type="text" name="lnameTxt" maxlength="100" size="25" placeholder="Enter Last Name" />
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
									<input type="password" name="passTxt" maxlength="12" size="25" placeholder="Enter Password"  required/>
									<!--<img src="tooltip.gif" title= "Password must contains minimum 8 characters"> </img>
								--></td>
							</tr>
							<tr>	
								<td valign="top">
									<label class="subHeading" style="margin-left:10px"> Re-enter Password * </label>
								</td>
								<td valign="top">
									<input type="password" name="repassTxt" maxlength="12" size="25" placeholder="Re-Enter Password"  required/>
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
									<input type="text" name="zipTxt" maxlength="6" size="25" placeholder="Enter Zipcode" required/>
								</td>
							</tr>
							<tr>	
								<td valign="top"> 	
									<label class="subHeading" style="margin-left:10px"> Contact  </label>
								</td>
								<td valign="top">
									<input type="text" name="contactTxt" maxlength="10" size="25" placeholder="Enter Contact no" />
								</td>
							</tr>
							</tbody>
							</table>
							<input align="center" type="submit" name="submitBtn" class="button" Value="Submit" style="margin-left:255px;"/> <br> <br> <br>
						</form>
						</section> 
			
			</section>
						
		</div>
		<div class="occasionListBg">
			<section style="height:40px;" class="center" style="font-size:12px;" align="center">
				<label style="color:#ccc;"><br>Copyright &copy; at NoStressCelebration Occasion Celebration Planner</label>
			</section>
		</div>
	</body>
</html>