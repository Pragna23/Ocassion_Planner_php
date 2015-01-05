
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
				
				var email = document.spregister.emailTxt.value;
				var pass = document.spregister.passTxt.value;
				
				//var email_regx =/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,4}/;
				//var email_regx =/^[0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,4}$/;
				var email_regx =/^[0-9a-zA-Z]+[._]?[0-9a-zA-Z]+@[-0-9a-zA-Z._]+\.[a-zA-Z]{2,4}$/;
				var pass_regx = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])\w{6,}$/;
				var HTML_reg1=/<[^>\r\n]+>/gi;
				var HTML_reg2=/<[^>\r\n]+/gi;
				//var name_regx=/^[a-zA-Z]'?[-a-zA-Z]+$/;
				var name_regx=/^[a-zA-Z][-'a-zA-Z]+$/;
			
		if(document.spregister.cnameTxt.value.match(HTML_reg1) ||document.spregister.cemailTxt.value.match(HTML_reg1) ||document.spregister.cwebTxt.value.match(HTML_reg1) ||document.spregister.cContactTxt.value.match(HTML_reg1) ||document.spregister.ratTxt.value.match(HTML_reg1) ||document.spregister.fnameTxt.value.match(HTML_reg1) || document.spregister.lnameTxt.value.match(HTML_reg1) || document.spregister.emailTxt.value.match(HTML_reg1) || document.spregister.passTxt.value.match(HTML_reg1) || document.spregister.repassTxt.value.match(HTML_reg1) || document.spregister.streetTxt.value.match(HTML_reg1) || document.spregister.stateTxt.value.match(HTML_reg1) || document.spregister.cityTxt.value.match(HTML_reg1) || document.spregister.zipTxt.value.match(HTML_reg1))
		{
			alert("HTML TAG found! Plaese check your input!");
			return false;
			
		}
      else if(document.spregister.cnameTxt.value.match(HTML_reg2) ||document.spregister.cemailTxt.value.match(HTML_reg2) ||document.spregister.cwebTxt.value.match(HTML_reg2) ||document.spregister.cContactTxt.value.match(HTML_reg2) ||document.spregister.ratTxt.value.match(HTML_reg2) ||document.spregister.fnameTxt.value.match(HTML_reg2) || document.spregister.lnameTxt.value.match(HTML_reg2) || document.spregister.emailTxt.value.match(HTML_reg2) || document.spregister.passTxt.value.match(HTML_reg2) || document.spregister.repassTxt.value.match(HTML_reg2) || document.spregister.streetTxt.value.match(HTML_reg2) || document.spregister.stateTxt.value.match(HTML_reg2) || document.spregister.cityTxt.value.match(HTML_reg2) || document.spregister.zipTxt.value.match(HTML_reg2))
		{
			alert("HTML TAG found! Plaese check your input!");
			return false;
			
		}
		else if (!(document.spregister.fnameTxt.value.match(name_regx)))
		{
			alert("Incorrect First name");
			return false;
		}
		else if (!(document.spregister.lnameTxt.value.match(name_regx)))
		{
			alert("Incorrect Last name");
			return false;
		}
        else if (!(email.match(email_regx)))
		{
			alert("Please enter Valid email address");
			return false;
		}
        else if(document.spregister.passTxt.value!=document.spregister.repassTxt.value)
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
		<div class="logoBg">
			<?php include("/templatemainframe/headerLogoLinks.html"); ?>
		</div>
		<div class="occasionListBg">
			<?php // include("/templatemainframe/eventlinks.php"); ?>
		</div>
		<div>
			<section class="center" style="margin-top:10px">
				<section class="curvedRectBoxes" style="width:70%;height:auto;align:center;display:inline-block;vertical-align:top;text-align:left;margin-left:160px;" align="center">
					<label><span class="mainHeading">Service Provider Registration Form</span></label><hr>
					
					<nav id="navListHeader">
							<a href="register.php"> User? Register Here </a>
					</nav>
					
					<form name= "spregister" action="SPRegister_script.php" onsubmit="return validateForm()" method="POST" style="width:100%;text-align:left;margin-left:0px;margin-top:0px">
						<table width="600px" align="center">
						<thead>
						</thead>
						<tbody>
						<br>
						<td colspan='2'style="font-family:arial,serif;font-size:13px;color:#444;" > <h4>Authorized Person's Details </h4> </td>
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
								<input type="text" name="lnameTxt" maxlength="100" size="25" placeholder="Enter Last Name"  />
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
							</td>
						</tr>
						<tr>	
							<td valign="top">
								<label class="subHeading" style="margin-left:10px;"> Re-enter Password * </label>
							</td>
							<td valign="top">
								<input type="password" name="repassTxt" maxlength="12" size="25" placeholder="Re-Enter Password"  required/>
							</td>
						</tr>
						<td colspan="2" style="font-family:arial,serif;font-size:13px;color:#444;"> <h4>Company Details <h4> </td>
						<tr>	
							<td valign="top">
								<label class="subHeading" style="margin-left:10px"> Name * </label>
							</td>
							<td valign="top">
								<input type="text" name="cnameTxt" maxlength="100" size="25" placeholder="Enter Name of Your Company"/ required>
							</td>
						</tr>
						<tr>	
							<td valign="top">
								<label class="subHeading" style="margin-left:10px"> Email *</label>
							</td>
							<td valign="top">
								<input type="email" name="cemailTxt" maxlength="100" size="25" placeholder="Enter Email Address of Company"/ required>
							</td>
						</tr>
						<tr>	
							<td valign="top">
								<label class="subHeading" style="margin-left:10px"> Services * </label>
							</td>
							<td valign="top">
								<select name="serviceOpt" placeholder="Select Service Provided by Company"/ required>
									<option value="food">Food</option>
									<option value="photo">Photography</option>
									<option value="venue">Venue</option>
									
								</select>
							</td>
						</tr>
						<tr>	
							<td valign="top">
								<label class="subHeading" style="margin-left:10px"> Comapny Website </label>
							</td>
							<td valign="top">
								<input type="url" name="cwebTxt" maxlength="150" size="25" placeholder="Enter URL of Company Website"/>
							</td>
						</tr>
						<tr>	
							<td valign="top">
								<label class="subHeading" style="margin-left:10px"> Contact Number *</label>
							</td>
							<td valign="top">
								<input type="text" name="cContactTxt" maxlength="10" size="25" placeholder="Enter Company's contact number"/ required>
							</td>
						</tr>
						<tr>	
							<td valign="top">
								<label class="subHeading" style="margin-left:10px"> Street * </label>
							</td>
							<td valign="top">
								<input type="text" name="streetTxt" maxlength="100" size="25" placeholder="Enter Street Address" required />
							</td>
						</tr>
						<tr>	
							<td valign="top">
								<label class="subHeading" style="margin-left:10px"> City * </label>
							</td>
							<td valign="top">
								<input type="text" name="cityTxt" maxlength="100" size="25" placeholder="Enter Name of City" required/>
							</td>
						</tr>
						<tr>	
							<td valign="top">
								<label class="subHeading" style="margin-left:10px"> State *</label>
							</td>
							<td valign="top">
								<input type="text" name="stateTxt" maxlength="100" size="25" placeholder="Enter Name of State" required />
							</td>
						</tr>
						<tr>	
							<td valign="top">
								<label class="subHeading" style="margin-left:10px"> Zipcode * </label>
							</td>
							<td valign="top">
								<input type="text" name="zipTxt" maxlength="5" size="25" placeholder="Enter Zipcode" required/>
							</td>
						</tr>
						<tr>	
							<td valign="top">
								<label class="subHeading" style="margin-left:10px"> Min Price  </label>
							</td>
							<td valign="top">
								<input type="text" name="minTxt" maxlength="100" size="25" placeholder="Enter Minimum Price" />
							</td>
						</tr>
						<tr>	
							<td valign="top">
								<label class="subHeading" style="margin-left:10px"> Rating reference </label>
							</td>
							<td valign="top">
								<input type="text" name="ratTxt" maxlength="100" size="25" placeholder="Enter rating reference"/>
							</td>
						</tr>
						<tr>	
							<td valign="top">
								<label class="subHeading" style="margin-left:10px"> Upload Photo </label>
							</td>
							<td valign="top">
								<input type="file" name="datafile" size="40"/>
							</td>
						</tr>
						</tbody>
						</table>
						<input align="center" type="submit" name="submitBtn" class="button" Value="Submit" style="margin-left:175px;"/> <br> <br> <br>
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