<?php
//global $lid;
error_reporting(E_ALL);
include("dbWrapper.php");	
$conId=connect_toDB();

// Variable deceleration
//$lid= "";
$fname="";$lname="";$email="";$pass="";$repass="";$street="";$city="";$state="";$zip="";$contact="";

// Connect database


if(isset($_POST["fnameTxt"]) && !empty($_POST["fnameTxt"]))
	$fname=addslashes(strip_tags($_POST["fnameTxt"]));
if(isset($_POST["lnameTxt"]) && !empty($_POST["lnameTxt"]))
	$lname=addslashes(strip_tags($_POST["lnameTxt"]));
if(isset($_POST["emailTxt"]) && !empty($_POST["emailTxt"]))
	$email=addslashes(strip_tags($_POST["emailTxt"]));
if(isset($_POST["passTxt"]) && !empty($_POST["passTxt"]))
	$pass=addslashes(strip_tags($_POST["passTxt"]));
if(isset($_POST["repassTxt"]) && !empty($_POST["repassTxt"]))
	$repass=addslashes(strip_tags($_POST["repassTxt"]));
if(isset($_POST["streetTxt"]) && !empty($_POST["streetTxt"]))
	$street=addslashes(strip_tags($_POST["streetTxt"]));
if(isset($_POST["cityTxt"]) && !empty($_POST["cityTxt"]))
	$city=addslashes(strip_tags($_POST["cityTxt"]));
if(isset($_POST["stateTxt"]) && !empty($_POST["stateTxt"]))
	$state=addslashes(strip_tags($_POST["stateTxt"]));
if(isset($_POST["zipTxt"]) && !empty($_POST["zipTxt"]))
	$zip=addslashes(strip_tags($_POST["zipTxt"]));
if(isset($_POST["contactTxt"]) && !empty($_POST["contactTxt"]))
	$contact=addslashes(strip_tags($_POST["contactTxt"]));
	
$pass=sha1($pass);
$repass=sha1($repass);

$fname=mysqli_real_escape_string($conId,$fname);
$lname=mysqli_real_escape_string($conId,$lname);
$pass=mysqli_real_escape_string($conId,$pass);
$repass=mysqli_real_escape_string($conId,$repass);
$email=mysqli_real_escape_string($conId,$email);
$street=mysqli_real_escape_string($conId,$street);
$city=mysqli_real_escape_string($conId,$city);
$state=mysqli_real_escape_string($conId,$state);
$contact=mysqli_real_escape_string($conId,$contact);


if($pass==$repass)
	{
	mysqli_query($conId,"INSERT INTO userinfo_tbl(u_email, u_pass, u_first_name, u_last_name, u_street, u_city, u_state, u_zip, u_contact) VALUES ('$email','$pass','$fname','$lname','$street','$city','$state','$zip','$contact')");
	}
else
	echo "Password do not match. Please try again";

if(mysqli_affected_rows($conId)==1)
{
	echo "Inserted successfully";
	header("Location: login.php");
}
else
{
	echo mysqli_error($conId);
		exit;
}


mysqli_close($conId);

?>
