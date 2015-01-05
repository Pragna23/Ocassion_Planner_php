<?php

error_reporting(E_ALL);
include("dbWrapper.php");
$conId=connect_toDB();

// Variable deceleration

$a="";$b="";$c="";$d="";$e="";$f="";$g="";$h="";$i="";$j="";$k="";$l="";$m="";$n="";$o="";$p="";$q="";

// Connect database
//$lid=connect();

//SP Details
if(isset($_POST["fnameTxt"]) && !empty($_POST["fnameTxt"]))
	$a=strip_tags($_POST["fnameTxt"]);
if(isset($_POST["lnameTxt"]) && !empty($_POST["lnameTxt"]))
	$b=strip_tags($_POST["lnameTxt"]);
if(isset($_POST["emailTxt"]) && !empty($_POST["emailTxt"]))
	$c=strip_tags($_POST["emailTxt"]);
if(isset($_POST["passTxt"]) && !empty($_POST["passTxt"]))
	$d=strip_tags($_POST["passTxt"]);
if(isset($_POST["repassTxt"]) && !empty($_POST["repassTxt"]))
	$e=strip_tags($_POST["repassTxt"]);

	//Company Details	
if(isset($_POST["cnameTxt"]) && !empty($_POST["cnameTxt"]))
	$f=strip_tags($_POST["cnameTxt"]);
if(isset($_POST["cemailTxt"]) && !empty($_POST["cemailTxt"]))
	$g=strip_tags($_POST["cemailTxt"]);
if(isset($_POST["serviceOpt"]) && !empty($_POST["serviceOpt"]))
	$h=strip_tags($_POST["serviceOpt"]);
if(isset($_POST["cwebTxt"]) && !empty($_POST["cwebTxt"]))
	$i=strip_tags($_POST["cwebTxt"]);
if(isset($_POST["cContactTxt"]) && !empty($_POST["cContactTxt"]))
	$j=strip_tags($_POST["cContactTxt"]);	
if(isset($_POST["streetTxt"]) && !empty($_POST["streetTxt"]))
	$k=strip_tags($_POST["streetTxt"]);
if(isset($_POST["cityTxt"]) && !empty($_POST["cityTxt"]))
	$l=strip_tags($_POST["cityTxt"]);
if(isset($_POST["stateTxt"]) && !empty($_POST["stateTxt"]))
	$m=strip_tags($_POST["stateTxt"]);
if(isset($_POST["zipTxt"]) && !empty($_POST["zipTxt"]))
	$n=strip_tags($_POST["zipTxt"]);
if(isset($_POST["datafile"]) && !empty($_POST["datafile"]))
	$o=$_POST["datafile"];
if(isset($_POST["minTxt"]) && !empty($_POST["minTxt"]))
	$p=strip_tags($_POST["minTxt"]);
if(isset($_POST["ratTxt"]) && !empty($_POST["ratTxt"]))
	$q=strip_tags($_POST["ratTxt"]);
	
$o = $_FILES['datafile']['name'];
$a=addslashes($a);
$b=addslashes($b);
$c=addslashes($c);
$d=addslashes($d);
$d=sha1($d);
$e=addslashes($e);
$e=sha1($e);
$f=addslashes($f);
$g=addslashes($g);
$h=addslashes($h);
$i=addslashes($i);
$j=addslashes($j);
$k=addslashes($k);
$l=addslashes($l);
$m=addslashes($m);
$n=addslashes($n);
//$o=addslashes($o);
$p=addslashes($p);
$q=addslashes($q);
//$a=mysqli_real_escape_string($lid,$a);

if($d==$e)
	{
	//INSERT INTO `serviceprovider_tbl`(s_email, s_pass, s_category, sp_first_name, sp_last_name, c_photo, c_email, c_name, c_website, c_street, c_city, c_state, c_zip, c_contact, s_minprice, s_rating) VALUES ('$c','$d','$h','$a','$b','$o','$g','$f','$i','$k','$l','$m','$n','$j','$p','$q')
	mysqli_query($conId,"INSERT INTO `serviceprovider_tbl`(s_email, s_pass, s_category, sp_first_name, sp_last_name, c_photo, c_email, c_name, c_website, c_street, c_city, c_state, c_zip, c_contact, s_minprice, s_rating) VALUES ('$c','$d','$h','$a','$b','$o','$g','$f','$i','$k','$l','$m','$n','$j','$p','$q')");
	}
else
	echo "Password do not match. Please try again";

if(mysqli_affected_rows($conId)==1)
{
	echo "Inserted successfully";
	header("Location: login.php");
}
else
	echo "Insertion error";

mysqli_close($conId);

?>
