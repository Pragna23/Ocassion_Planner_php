
<?php
session_start(); 
$code = $_SESSION['code'];
$sel = $_SESSION['sel'];
$USid = $_SESSION['USid'];
include("dbWrapper.php");	
$conId=connect_toDB();

if(isset($_POST["code"]) && !empty($_POST["code"]))
	$a=strip_tags($_POST["code"]);
$a=addslashes($a);

if(isset($_POST["pass1"]) && !empty($_POST["pass1"]))
	$b=strip_tags($_POST["pass1"]);
$b=addslashes($b);
//Password encryption
$b=sha1($b);

if(isset($_POST["re_pass1"]) && !empty($_POST["re_pass1"]))
	$c=strip_tags($_POST["re_pass1"]);
$c=addslashes($c);
//Password encryption
$c=sha1($c);

if($code==$a)
{
	if($b==$c)
	{
		echo "Update password here";
		saveUserInfo($conId,$USid);
	}
	else
		echo "password do not match";
}
else
	echo "incorrect code";

function saveUserInfo($conId, $uid)
{
	$sqlQuery = 'update userinfo_tbl SET
					u_pass = "'.$b.'" where u_id='.$uid;
	
	if (! $res=mysqli_query($conId, $sqlQuery)) 
		{
			echo mysqli_error($conId);
			exit;
		}
		else 
		{
			header('Location:login.php');
			
		}
}
?>

