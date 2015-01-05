<?php

echo '<script type="text/javascript">
function createguestlist()
{
	
	document.getElementById("guestlistdiv").style.display = "block";
	document.getElementById("newguestlist").style.display = "none";
}

</script>';

if(isset($_REQUEST["respond"]))
{
	echo "RSVP = " .$_REQUEST["respond"];
}

/*commented====if(isset($_POST['type'])){
	$type=$_POST['type'];
	echo $type;
}===commented*/
/*$con=mysqli_connect("localhost","root","","plannerdb");
// Check connection
if (mysqli_connect_errno())
{
 	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}*/
$conId = connect_toDB();
$EventId=$_REQUEST["eid"];
$sql_query="select * from guestlist_tbl where u_id='".$UserId."' and e_id='".$EventId."'";
$res=mysqli_query($conId,$sql_query);	
#echo "Fine";
#echo ($_POST['response']);
if(mysqli_num_rows($res) == 0){
	echo '<label class="mainHeading" style="margin-top:20px">Guest List</label><hr><br><br>';
	echo '<label class="subText" style="margin-left:10px">You do not have any guest list.</label><br><br>';
	echo '<input type="button" id="newguestlist" onclick="createguestlist()" class="buttonCss" value="Create new guest list" />';
}
if(mysqli_num_rows($res) == 0 || isset($_POST['Submit'])){		
	createGuestList($UserId,$EventId,$conId);
}
else{
	if (isset($_POST['Save'])){
		saveGuestList($UserId,$EventId,$conId);
	}else if(isset($_POST['Send'])){
		sendGuestList($UserId,$EventId,$conId);
	}
	else if(isset($_POST['editGuest'])){
		$name=$_POST['name'];
		echo $name;
		#echo $_POST['email'];
		echo $_POST['userId'];
		#echo $_POST['emailId'];
	}
	else if(isset($_POST['RSVP'])){

		echo "RSVP";
		//echo $_POST['guestadd'];
	}

	
	else{
		showGuestList($UserId,$EventId,$conId);
	}

}
		
function saveGuestList($UserId,$EventId,$conId){
	if(!empty($_POST['email'])){
		$email=$_POST['email'];
		if(!empty($_POST['name'])){
			$name=$_POST['name'];
		}
		$sql_file ="INSERT INTO guestlist_tbl(u_id,e_id,g_name, g_email) VALUES ('".$UserId."','".$EventId."','".$name."','".$email."')";
		$result=mysqli_query($conId,$sql_file);
	}		
	$sql_query="select g_name,g_email from guestlist_tbl where u_id='".$UserId."' and e_id='".$EventId."'";
	$res=mysqli_query($conId,$sql_query);
	echo '<section id="showAllGuestList">';
	echo '<br><br><label class="subText" style="margin-left:10px">My Guest List for '.ucwords(1).' event.</label>';
	echo '<table cellspacing="0" cellpadding="0" border="1" style="width:80%;margin:10px">';
	echo '<tr><th><center>Guest Name</center></th><th>Edit</th><th>Delete</th></tr>';
	while($row = mysqli_fetch_assoc($res))
	{
		$emailId=$row["g_email"];
		echo '
		<tr>
			<td class="subText">Guest Name: '.$row["g_name"].'<br><label class="subHeading">Email: '.$row["g_email"].'</td>
			<td><A href=display.php?name='.$row["g_name"].'&email='.$row["g_email"].'&u_id='.$UserId.'&e_id='.$EventId.'>Edit<img src="edit1.PNG"   width="20" height="20" style="margin-left:10px"></A>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td><lable><img src="delete.JPG" width="42" height="42" style="margin-left:10px"></label></td>
		</tr>';
	}
	echo '</table>
	<br><br><form action="guestlist.php?eid='.$EventId.'" method="post">
	<input type="submit" name="Send" class="buttonCss" value="Send an Invite"/>
	</form>';
	
}

function sendGuestList($UserId,$EventId,$conId){
	echo "1";
	$sql_query="select g_name,g_email from guestlist_tbl where u_id=".$UserId." and e_id=".$EventId.";";
	echo "2";
	$res=mysqli_query($conId,$sql_query);
	while($row = mysqli_fetch_assoc($res))
	{
		echo "1";
		$emailId=$row["g_email"];
		sendEmail($row["g_name"],$row["g_email"]);
	}
	echo "Invitations sent Successfully <br>";
	showGuestList($UserId,$EventId,$conId);
}

function createGuestList($UserId,$EventId,$conId){
	if(isset($_POST['Submit'])){
		if(!empty($_POST['email'])){
			$email=$_POST['email'];
			if(!empty($_POST['name'])){
				$name=$_POST['name'];
			}
					
			$sql_file ="INSERT INTO guestlist_tbl(u_id,e_id,g_name, g_email) VALUES ('".$UserId."','".$EventId."','".$name."','".$email."')";
			
			$result=mysqli_query($conId,$sql_file);
			$sql_query="select g_name,g_email from guestlist_tbl where u_id='".$UserId."' and e_id='".$EventId."'";
			$res=mysqli_query($conId,$sql_query);
			echo '<section id="showAllGuestList">';
			echo '<br><br><label class="subText" style="margin-left:10px">My Guest List :</label>';
			echo '<table cellspacing="0" cellpadding="0" border="1" style="width:50%;margin:10px">';
			echo '<tr><th><center>Guest Name</center></tr>';
			while($row = mysqli_fetch_assoc($res))
			{
				echo '<tr>
				<td class="subText">Guest Name: '.$row["g_name"].'<br><label class="subHeading">Email: '.$row["g_email"].'</label></td>
				</tr>';
			}
			echo '</table>';
			echo '<br><br><form action="guestlist.php?eid='.$EventId.'" method="post">
			Name: <input type="text" name="name" /><br><br>
			Email: <input type="text" name="email" maxlength="100" size="25" placeholder="Enter Last Name" required/><br>
			<input type="submit" name="Submit" class="buttonCss" value="Add More Guests"/>
			<input type="submit" name="Save" class="buttonCss" value="Save GuestList"/>';
			echo '</form></section>';
			

		}
	}else{
		echo '<div id="guestlistdiv" style="display:none;margin-left:20px;font-size:16px">
		<form action="guestlist.php?eid='.$EventId.'" method="post">
		Name: <input type="text" name="name" /><br><br>
		* Email: <input type="text" name="email" required /><br><br>
		<input type="submit" name="Submit" class="buttonCss" Value="Submit"/>
		</form></div>';
	}
}

function showGuestList($UserId,$EventId,$conId){
	$sql_query="select g_name,g_email from guestlist_tbl where u_id='".$UserId."' and e_id='".$EventId."'";
	$res=mysqli_query($conId,$sql_query);
	echo '<section id="showAllGuestList">';
	echo '<br><br><label class="subText" style="margin-left:10px">My Guest List for '.ucwords(1).' event.</label>';
	echo '<table cellspacing="0" cellpadding="0" border="1" style="width:50%;margin:10px">';
	echo '<tr><th><center>Guest Name</center></tr>';
	while($row = mysqli_fetch_assoc($res))
	{
		$emailId=$row["g_email"];
		echo '
		<tr>
			<td class="subText">Guest Name: '.$row["g_name"].'<br><label class="subHeading">Email: '.$row["g_email"].'</td>
			
		</tr>';
	}
	echo '</table>';

}

function sendEmail($name,$email){
	require_once("../../phpmailer-master/class.phpmailer.php");
	require_once("../../phpmailer-master/PHPMailerAutoload.php"); 

 	#require_once('class.smtp.php');
    $mail = new PHPMailer(true);

	//Send mail using gmail
	    $mail->IsSMTP(); // telling the class to use SMTP
	    $mail->IsHTML(true);
	    $mail->SMTPAuth = true; // enable SMTP authentication
	    $mail->SMTPSecure = "tls"; // sets the prefix to the servier
	    $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
	    $mail->Port = 587; // set the SMTP port for the GMAIL server
	   // $mail->Username = "eventplanner26@gmail.com"; // GMAIL username
	   // $mail->Password = "stevens12"; // GMAIL password
		//Typical mail data
		$mail->AddAddress($email, $name);
		$mail->SetFrom("eventplanner26@gmail.com", "Event Planner");
		$mail->Subject = "Invitation";
		$yesres = "<a href='confirmrsvp.php?respond=Y'>Yes</a>";
		$nores = "<a href='confirmrsvp.php?respond=N'>No</a>";
		//$mail->Body = "Dear ".$name.",\nThis is a reminder email for ".$email." event on ".$email." ! See you there!!!\n\n"."Thanks & Regards\n"."Event Planner".$yesres."<br>".$nores;
		
		#$mail->Body = $messageFormat;
		$mail->Body= "<h1>Dear \"$name\",\nThis is a reminder email for \"$email\" event on \"$email\" ! See you there!!!\n\n.Thanks & Regards\n.Event Planner</h1>
		<form action=\"http://localhost/WP_project/pages/guestlist.php?eid=$EventId\" method=\"post\">	
		
		<input type=\"radio\" name=\"response\" value=\"1\">Coming<br/>
		<input type=\"radio\" name=\"response\" value=\"0\">Not Coming<br/>
		<input type=\"submit\" name=\"RSVP\" value=\"Please Respond\" />
		<!--<label id=\"toname\" style=\"display:block\">$email</label>-->
		</form>";
		
	try{
	    $mail->Send();
	} catch(Exception $e){
	    //Something went bad
	    echo "Fail - " . $mail->ErrorInfo;
	}
}

?>
