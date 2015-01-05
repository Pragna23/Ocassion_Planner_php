<html>
	<head>
		<title>NostressCelebration Event Planners</title>
		<link href="../css/style.css" type="text/css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Dancing+Script' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Tangerine' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Satisfy' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Zeyada' rel='stylesheet' type='text/css'>
		
		<style>
			.bgimg {
						background:url('../images/Alumni.jpg') no-repeat ; 
						background-size: cover;
					}
			#bgDesign {
						margin_left:auto;
						margin_right:auto;
						width:100%;				
						height:500px;
						/*background:url('../images/img5.jpg') no-repeat ; 
						display:inline-block;*/			
						vertical-align:top;
						border:solid 1px #cbbd9a; 
						border-radius:5px;
						}
			td{
				
				height:40px;
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
			/*h1{
				margin-left:2cm;
				padding-left: 50px;
			}*/
			p {
						
							text-align:right;
							color: red;
						}
			p.padding {
						padding-top: 25px;
						padding-right: 100px;
						padding-bottom: 25px;
						padding-left: 250px;
					}
			.wordwrap { 
						   white-space: pre-wrap;      /* CSS3 */   
						   white-space: -moz-pre-wrap; /* Firefox */    
						   white-space: -pre-wrap;     /* Opera <7 */   
						   white-space: -o-pre-wrap;   /* Opera 7 */    
						   word-wrap: break-word;      /* IE */
						}
			
		</style>
		<script lanugage=javascript runat=server>
	
	function ChangeLabel1(obj) {
				document.getElementById("label1").style.font="70px dancing script,Gabriola, Arial";
				var ob = obj.value;			
				var result = ob.fontcolor("#680000");
				label1.innerHTML = result;			
			}
		function ChangeLabel2(obj) {
				document.getElementById("label2").style.font="italic bold 13px arial,serif";
				var ob = obj.value;			
				var result = ob.fontcolor("#780000 ");
				label2.innerHTML = result;
			}
		function ChangeLabel3(obj) {
				document.getElementById("label3").style.font="italic bold 13px arial,serif";
				var ob = obj.value;			
				var result = ob.fontcolor("#780000 ");
				label3.innerHTML = result;		
			}
		function ChangeLabel4(obj) {
				document.getElementById("label4").style.font="italic bold 13px arial,serif";
				var ob = obj.value;			
				var result = ob.fontcolor("#780000 ");
				label4.innerHTML = result;		
			}
		function ChangeLabel5(obj) {
				document.getElementById("label5").style.font="italic bold 13px arial,serif";
				var ob = obj.value;			
				var result = ob.fontcolor("#780000 ");
				label5.innerHTML = result;		
			}
		function ChangeLabel6(obj) {
				document.getElementById("label6").style.font="italic bold 13px arial,serif";
				var ob = obj.value;			
				var result = ob.fontcolor("#780000 ");
				label6.innerHTML = result;		
			}
		
						
			/*function convert(degree) {
						if (degree == "TXT1") {
							LBL1 = document.getElementById("text1").value;
							document.getElementById("label1").value = LBL1;
						}else if (degree == "TXT2") {
							LBL2 = document.getElementById("text2").value;
							document.getElementById("label2").innerHTML = LBL2;
						} else	{
							LBL3 = (document.getElementById("text3").value;
							document.getElementById("label3").innerHTML = LBL3;
						}
					}*/
			</script>
		
	</head>
	<body>
		<div class="logoBg">
			<?php include("/headerLogoLinks.html"); ?>
		</div>
		<div class="occasionListBg">
			<?php include("/occasionLinks.php"); ?>
		</div>
		<div>
			<section  class="center" style="margin-top:10px">	
			<section class="bgimg" id="bgDesign" style="margin-top:30px;display:inline-block;vertical-align:top;text-align:right;">	
				<div class="wordwrap" style="text-align:center;width:620px;height:auto;margin-left:300px;margin-top:180px;">
				    <label class="mainHeading" id="label1" style="font-size:65px;color:680000;"> EVENT NAME </label> 
				</div>
				
				<div style="text-align:center;width:300px;height:auto;margin-left:600px;margin-top:5px;">
				<p style="font-family:arial,serif;font-size:13px;padding-right:10px;margin-top:100px;font-weight:bold;"> Host Name :
					<label class="padding" id="label2" style="font-family:arial,serif;font-size:13px;color:#444;"> HOST NAME HERE </label><br>
				<p  style="font-family:arial,serif;font-size:13px;font-weight:bold;">Contact Number :
					<label class="padding" id="label3" style="font-family:arial,serif;font-size:13px;color:#444;"> CONTACT NUMBER </label> <br>
				<p  style="font-family:arial,serif;font-size:13px;font-weight:bold;">Venue :
					<label class="padding" id="label4" style="font-family:arial,serif;font-size:13px;color:#444;"> LOCATION FOR OCASSION </label> <br>
				<p  style="font-family:arial,serif;font-size:13px;font-weight:bold;">Date & Time:
					on <label class="padding" id="label6" style="font-family:arial,serif;font-size:13px;color:#444;font-weight:bold;"> DATE & </label> 
					at <label class="padding" id="label5" style="font-family:arial,serif;font-size:13px;color:#444;font-weight:bold;"> TIME  </label> <br>
				</div>
			</section>
			
			<section class="curvedRectBoxes" style="width:100%;height:auto;display:inline-block;vertical-align:top;" >
			<label><span class="mainHeading">Create Your Own</span></label><hr>
			<form action="indexer_process.php" method="POST" style="width:100%;text-align:left;margin-left:0px;margin-top:0px">
				<table align="center" width="600px">
					<thead>
					</thead>
					<tbody>
						<br>
						<tr>	
							<td style="width:170px;"valign="top">
								<label class="subHeading" style="margin-left:10px"> Event Name* </label>
							</td>
							<td valign="top">
								<input id="text1" onChange="ChangeLabel1(this);" type="text" name="EventTxt" maxlength="100" size="25" placeholder="Enter Name of Event"  required/>
							</td>
						</tr>	
						<tr>	
							<td style="width:170px;"valign="top">
								<label class="subHeading" style="margin-left:10px"> Host Name : </label>
							</td>
							<td valign="top">
								<input id="text2" onChange="ChangeLabel2(this);" type="text" name="fnameTxt" maxlength="100" size="25" placeholder="Enter Host Name"  required/>
							</td>
						</tr>	
						<tr>	
							<td style="width:170px;"valign="top">
								<label class="subHeading" style="margin-left:10px"> Contact Number: </label>
							</td>
							<td valign="top">
								<input id="text3" onChange="ChangeLabel3(this);" type="text" name="fnameTxt" maxlength="100" size="25" placeholder="Enter Contact Number"  required/>
							</td>
						</tr>	
						<tr>	
							<td style="width:170px;"valign="top">
								<label class="subHeading" style="margin-left:10px"> Venue: </label>
							</td>
							<td valign="top">
								<textarea id="text4" onChange="ChangeLabel4(this);" rows="5" cols="27"></textarea> <br> <br>
							</td>
						</tr>
						<tr>	
							<td style="width:170px;"valign="top">
								<label class="subHeading" style="margin-left:10px"> Start Time and Date : </label>
							</td>
							<td valign="top">
								<input id="text6" onChange="ChangeLabel6(this);" type="date" name="fnameTxt" required/>
								<input id="text5" onChange="ChangeLabel5(this);" type="time" name="fnameTxt"required/>
								
							</td>
						</tr>	
					</tbody>
					</table>
					<input type="submit" value="Save" name="submitBtn" class="button" style="margin-left:255px;"/>
					<input type="reset" value="Reset" name="resetBtn" class="button" style="margin-left:25px;"/><br><br><br>
					<!-- Event Name:	<input id="text1" onKeyup="convert('TXT1');"><br>
					Host Name : <input id="text2" onKeyup="convert('TXT2');"><br>
					Phone Number : <input id="text3" onkeyup="convert('TXT3');"> -->
					
					<!-- Event Name:	<input id="text1" onChange="ChangeLabel1(this);"><br>
					Host Name : <input id="text2" onChange="ChangeLabel2(this);"><br>
					Phone Number : <input id="text3" onChange="ChangeLabel3(this);"> -->
			</section>
		</section>
		</div>
	</body>
</html>