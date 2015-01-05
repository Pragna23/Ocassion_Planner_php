<?php 
error_reporting(E_ALL);
include("dbWrapper.php");	
$conId=connect_toDB();

// Variable decleration
$a = "";
$b= "";


// Start session & connect database
session_start();


// User Email:- Add slashed to prevent SQL injection
if(isset($_POST["emailTxt"]) && !empty($_POST["emailTxt"]))
	$a=strip_tags($_POST["emailTxt"]);
$a=addslashes($a);
// if (!preg_match("/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,4}/", $email)) die("Invalid email address");
// User Password:- Add slashed to prevent SQL injection
if(isset($_POST["passTxt"]) && !empty($_POST["passTxt"]))
	$b=strip_tags($_POST["passTxt"]);
$b=addslashes($b);
//Password encryption
$b=sha1($b);

echo '</BR>'."Email: ".$a.'</BR>'."Password: ".$b.'</BR>'; 
		$q_out1=mysqli_query($conId,"SELECT u_id,u_email, u_first_name, u_flag FROM userinfo_tbl WHERE u_email='$a' AND u_pass='$b'");
		$q_out3=mysqli_query($conId,"SELECT count(*) FROM userinfo_tbl WHERE u_email='$a' AND u_pass='$b'");
		$r3=mysqli_fetch_array($q_out3);
		echo "No of rows: ".$r3[0].'</BR>'; 
		if($r3[0]==1)
		{
			$arr=mysqli_fetch_array($q_out1);
			if($arr[3]=="ad")
			{
				$_SESSION["adminid"]=$arr[0];
				header("Location: admininfo.php");
			}
			else
			echo "Do not have Admin rights";
		}
		else
			echo "Invalid email id and/or password For Admin";

?>
