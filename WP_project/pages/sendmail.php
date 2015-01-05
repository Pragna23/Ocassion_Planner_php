<?php
require_once("../../phpmailer-master/class.phpmailer.php");
require_once("../../phpmailer-master/PHPMailerAutoload.php"); 
$mail = new PHPMailer(true);

$mail->IsSMTP(); // telling the class to use SMTP
	$mail->IsHTML(true);
	$mail->SMTPAuth = true; // enable SMTP authentication
	$mail->SMTPSecure = "tls"; // sets the prefix to the servier
	$mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
	$mail->Port = 587;

if(isset($_REQUEST["send"]))
{
	
	$mail->AddAddress('eventplanner26@gmail.com', 'admin');
	$mail->SetFrom($_REQUEST["email"], $_REQUEST["name"]);
	$mail->Subject = "Contact Us Request";
	$mail->Body= 'You have an new contact us request from '.$_REQUEST["name"].'<br><br>Message:'.
	strip_tags($_REQUEST["message"]);
	
	try{
	    $mail->Send();
		echo "success";
		header('location: contact.php');
	} catch(Exception $e){
	    //Something went bad
	    echo "Fail - " . $mail->ErrorInfo;
	}
		
}
elseif(isset($_REQUEST["help"]))
{
	
	$mail->AddAddress($_REQUEST["helperemail"], $_REQUEST["helpername"]);
	$mail->SetFrom("eventplaner240@gmail.com", "admin");
	$mail->Subject = "Help request from ".$_REQUEST["username"];
	
	$mail->Body= 'Dear '. strip_tags($_REQUEST["helpername"]).',<br><br>'.strip_tags($_REQUEST["username"]).' has assigned you as an helper for his/her event. If you are already a member of NoStressCelebration, sign in or Sign Up for new member</a>';
	//$mail->Body= "Hello";

	
	try{
	    if($mail->Send())
		{
		echo "success";
		}
		else
		{
			echo "not success";
		}
		header('location: todo.php?eid='.$_REQUEST["evid"]);
	} catch(Exception $e){
	    //Something went bad
	    echo "Fail - " . $mail->ErrorInfo;
	}
		
}
elseif(isset($_REQUEST["servicesend"]))
{
	
	$mail->AddAddress($_REQUEST["spemail"], $_REQUEST["spname"]);
	$mail->SetFrom($_REQUEST["email"], $_REQUEST["name"]);
	$mail->Subject = "Service provider request ".$_REQUEST["username"];
	
	$mail->Body= 'You have an new service request from '.$_REQUEST["name"].'<br><br>Message:'.
	addslashes(strip_tags($_REQUEST["message"]));

	
	try{
	    if($mail->Send())
		{
		echo "success";
		}
		else
		{
			echo "not success";
		}
		//header('location: todo.php?eid='.$_REQUEST["evid"].'\');
	} catch(Exception $e){
	    //Something went bad
	    echo "Fail - " . $mail->ErrorInfo;
	}
		
}
else
{
	echo "something went wrong";
}
?>