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

// Check for radio selection
$c=$_POST["usr"];

echo '</BR>'."Selection: ".$c; 
echo '</BR>'."Email: ".$a.'</BR>'."Password: ".$b.'</BR>'; 
if($c=="user")
	{
		$q_out1=mysqli_query($conId,"SELECT u_id,u_email, u_first_name FROM userinfo_tbl WHERE u_email='$a' AND u_pass='$b'");
		$q_out3=mysqli_query($conId,"SELECT count(*) FROM userinfo_tbl WHERE u_email='$a' AND u_pass='$b'");
		$r3=mysqli_fetch_array($q_out3);
		echo "No of rows: ".$r3[0].'</BR>'; 
		if($r3[0]==1)
			{
				
				$arr=mysqli_fetch_array($q_out1);
				$_SESSION["userid"]=$arr[0];
				$_SESSION["ufname"]=$arr[2];
				header("Location: myinfo.php?ut=u");
			}
		else
			echo "Invalid email id and/or password For User";
	}
else if($c=="sp")
	{
		$q_out2=mysqli_query($conId,"SELECT s_id,s_email, sp_first_name FROM serviceprovider_tbl WHERE s_email='$a' AND s_pass='$b' and sp_grant='Y'");
		$q_out4=mysqli_query($conId,"SELECT count(*) FROM serviceprovider_tbl WHERE s_email='$a' AND s_pass='$b'");
		$r4=mysqli_fetch_array($q_out4);
		echo "No of rows: ".$r4[0].'</BR>'; 
		if($r4[0]==1)
			{
				$arr=mysqli_fetch_array($q_out2);
				$_SESSION["sid"]=$arr[0];
				$_SESSION["sfname"]=$arr[2];
				header("Location: myinfo.php?ut=sp");
			}
		else
			echo "Invalid email id and/or password For Service Provider";
}
else
	echo "Invalid Selection: Select User or SP";

?>
