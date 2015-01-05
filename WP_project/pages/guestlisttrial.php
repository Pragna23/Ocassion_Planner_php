<?php
//$EventId= " ";
echo '<script type="text/javascript">
function createguestlist()
{
	
	document.getElementById("guestlistdiv").style.display = "block";
	document.getElementById("newguestlist").style.display = "none";
}

</script>';

#if(isset($_REQUEST["respond"]))
#{
#	echo "RSVP = " .$_REQUEST["respond"];
#}

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
//$conId = connect_toDB();
//$EventId=$_REQUEST["eid"];
$eventname;
$sel_sql = "select e_name from event_tbl where e_id='".$EventId."'";
	if (! $res=mysqli_query($conId, $sel_sql)) 
	{
		echo mysqli_error($conId);
		exit;
	}
	else 
	{
		$eventarr = mysqli_fetch_array($res);
		$eventname = $eventarr[0];
		//echo $eventname;
	}	
	$sql_query="select * from guestlist_tbl where u_id=".$UserId." and e_id=".$EventId;
	$res=mysqli_query($conId,$sql_query);	
	if(mysqli_num_rows($res) == 0){
		if(isset($_POST['Send'])){
			if( validateForm($_POST['email'], $_POST['name']))
				sendGuestList($UserId,$EventId,$conId,$eventname);
			else{
				createGuestList($UserId,$EventId,$conId);
			}
		}else if(isset($_POST['Add'])){		
			createGuestList($UserId,$EventId,$conId);
		}else{
			echo '<br><br><form action="guestlist.php?eid='.$EventId.'" method="post">';
			echo '<label class="mainHeading" style="margin-top:20px">Guest List</label><hr><br><br>';
			echo '<label class="subText" style="margin-left:10px">You do not have any guest list.</label><br><br>';
			echo '<input type="submit" name="Add" id="newguestlist" onclick="createguestlist()" class="buttonCss" value="Create new guest list" />';
			echo '</form></section>';
		}
	}	
	else{
		if(isset($_POST['Send'])){
			if( validateForm($_POST['email'], $_POST['name']))
				sendGuestList($UserId,$EventId,$conId,$eventname);
			else{
				createGuestList($UserId,$EventId,$conId);
			}
		}else if(isset($_POST['Add'])){
			createGuestList($UserId,$EventId,$conId);
		}else{
			showGuestList($UserId,$EventId,$conId);
		}
	}

function sendGuestList($UserId,$EventId,$conId,$ename){
	if(!empty($_POST['email'])){
		$email=$_POST['email'];
		if(!empty($_POST['name'])){
			$name=$_POST['name'];
		}
		$sql_file ="INSERT INTO guestlist_tbl(u_id,e_id,g_name, g_email) VALUES ('".$UserId."','".$EventId."','".addslashes($name)."','".addslashes($email)."')";
		$result=mysqli_query($conId,$sql_file);
		sendEmail($name,$email,$EventId, $UserId,$ename);
		
		echo "<b>Invitation  Successfully  sent to  ".$_POST['name']."<b/><br>";
		echo '<br><br><form action="guestlist.php?eid='.$EventId.'" method="post">
		<input type="submit" name="Add" class="buttonCss" value="Add More Guest"/>
		<input type="submit" name="Show" class="buttonCss" value="Show Guest List"/>';
		echo '</form></section>';
	}
}

function createGuestList($UserId,$EventId,$conId){
	echo '<br><br><form action="guestlist.php?eid='.$EventId.'" method="post">
	*Name: <input type="text" name="name" maxlength="20" size="25" placeholder="Enter Name " required/><br><br>
	*Email: <input type="text" name="email" maxlength="100" size="25" placeholder="Enter Email " required/><br><br>
	<input type="submit" name="Send" class="buttonCss" value="Send an Invite"/>';
	echo '</form></section>';
}

function showGuestList($UserId,$EventId,$conId){
	$sql_query="select g_name,g_email,g_rsvp from guestlist_tbl where u_id='".$UserId."' and e_id='".$EventId."'";
	$res=mysqli_query($conId,$sql_query);
	echo '<section id="showAllGuestList">';
	echo '<br><br><label class="subText" style="margin-left:10px">My Guest List for '.ucwords(1).' event.</label>';
	echo '<table cellspacing="0" cellpadding="0" border="1" style="width:50%;margin:10px">';
	echo '<tr><th><center>Guest Name</center></tr>';
	while($row = mysqli_fetch_assoc($res))
	{
		$emailId=$row["g_email"];
		if($row["g_rsvp"]==NULL){
			echo '
			<tr>
				<td class="subText">Guest Name: '.stripcslashes($row["g_name"]).'<br><label class="subHeading">Email: '.stripcslashes($row["g_email"]).'<br><label class="subHeading">Response: Awaited</td>
			</tr>';	
		}else if($row["g_rsvp"]=='Y'){
			echo '
			<tr>
				<td class="subText">Guest Name: '.stripcslashes($row["g_name"]).'<br><label class="subHeading">Email: '.stripcslashes($row["g_email"]).'<br><label class="subHeading">Response: Coming</td>
			</tr>';	
		}else{
			echo '
			<tr>
				<td class="subText">Guest Name: '.stripcslashes($row["g_name"]).'<br><label class="subHeading">Email: '.stripcslashes($row["g_email"]).'<br><label class="subHeading">Response: Not Coming</td>
			</tr>';	
		}
		
	}
	echo '</table>';
	echo '<br><br><form action="guestlist.php?eid='.$EventId.'" method="post">
	<input type="submit" name="Add" class="buttonCss" value="Add More Guest"/>';

}

function validateForm($email, $name)
{
   	$nameflag=false;
   	$emailflag=false;
	$name_regx='/^[a-z0-9\/"\'\-]{1,75}$/i';
	#$name_regx='/^[a-z0-9()\/"\':\*+|,.; \-!?&#$@]{1,75}$/i';
	$email_regx ='/^[0-9a-zA-Z]+[.+_]?[0-9a-zA-Z]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,4}$/';
	if(!preg_match($email_regx,$email)){
		echo "Email name is invalid,Please Enter Valid Email";
	}else{
		$emailflag=true;
	}

	if(!preg_match($name_regx,$name)){
		echo "Name is invalid, Please Enter Valid Name";
	}else{
		$nameflag=true;
	}

	if($nameflag && $emailflag)
		return true;
	else
		return false;
}

function sendEmail($name,$email,$EventId, $UserId,$eventname){
	require_once("../../phpmailer-master/class.phpmailer.php");
	require_once("../../phpmailer-master/PHPMailerAutoload.php"); 

 	
    $mail = new PHPMailer(true);
    #echo $email;
	//Send mail using gmail
	    $mail->IsSMTP(); // telling the class to use SMTP
	    $mail->IsHTML(true);
	    $mail->SMTPAuth = true; // enable SMTP authentication
	    $mail->SMTPSecure = "tls"; // sets the prefix to the servier
	    $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
	    $mail->Port = 587; // set the SMTP port for the GMAIL server
	    $mail->Username = "eventplaner240@gmail.com"; // GMAIL username
	    $mail->Password = "stevens1234"; // GMAIL password
		//Typical mail data
		$mail->AddAddress($email, $name);
		$mail->SetFrom("eventplanner26@gmail.com", "Event Planner");
		$mail->Subject = "Invitation";
		$yesres = "<a href='confirmrsvp.php?respond=Y'>Yes</a>";
		$nores = "<a href='confirmrsvp.php?respond=N'>No</a>";
		$vars = array('uid' => $UserId, 'eid' => $EventId, 'email' => $email,'eventname'=>$eventname);
		$querystring = http_build_query($vars);
		#$mail->Body = "Dear ".$name.",\nThis is a reminder email for ".$email." event on ".$email." ! See you there!!!\n\n"."Thanks & Regards\n"."Event Planner".$yesres."<br>".$nores;
		
		#$mail->Body = "Hello";
		#$mail->Body= "<h1>Dear \"$name\",\nThis is a reminder email for \"$email\",\n\n event name \"$eventname\" ! See you there!!!\n\n"."Thanks & Regards\n"."Event Planner</h1>
		$mail->Body = "Dear ".$name.",\nThis is a reminder email for ".$email." \n  for event ".$eventname." <br>! See you there!!!\n\n<br>"."Thanks & Regards\n<br>"."Event Planner<br>;
		<form action=\"http://localhost/WP_project/pages/guestResponse.php \" method=\"post\">
		
		<input type=\"radio\" name=\"response\" value=\"1\">Coming<br/>
		<input type=\"radio\" name=\"response\" value=\"0\">Not Coming<br/>
		<input type=\"submit\" name=\"RSVP\" value=\"Please Respond\" />
		<input type=\"hidden\" name=\"eid\" value=\"$EventId\">
		<input type=\"hidden\" name=\"uid\" value=\"$UserId\">
		<input type=\"hidden\" name=\"email\" value=\"$email\">
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
