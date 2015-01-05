<?php 
session_start(); 
error_reporting(E_ALL);
include("dbWrapper.php");	
$conId=connect_toDB();

// Variable decleration
$a = "";
$characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
$string = '';
 for ($i = 0; $i < 8; $i++) 
	{
      $string .= $characters[rand(0, strlen($characters) - 1)];
	}
	
// User Email:- Add slashed to prevent SQL injection
if(isset($_POST["emailTxt"]) && !empty($_POST["emailTxt"]))
	$a=strip_tags($_POST["emailTxt"]);
$a=addslashes($a);

// Check for radio selection
$c=$_POST["usr"];

if($c=="user")
	{
		$q_out1=mysqli_query($conId,"SELECT u_id,u_email, u_first_name, u_pass FROM userinfo_tbl WHERE u_email='$a'");
		$q_out3=mysqli_query($conId,"SELECT count(*) FROM userinfo_tbl WHERE u_email='$a'");
		$r3=mysqli_fetch_array($q_out3);
		echo "No of rows: ".$r3[0].'</BR>'; 
		if($r3[0]==1)
			{
				$arr=mysqli_fetch_array($q_out1);
				$b=$arr[3];
				$b=sha1($b);
				echo "Randon number generated is : ".$string.'<BR>';
				echo "* Email functionality will be used for this purpose, currently we are only explaining the functional flow. ";
				$_SESSION['code'] = $string;
				$_SESSION['sel'] = $c;
				$_SESSION['USid'] = $arr[0];
?>
			<div>
			<section class="center" style="margin-top:10px;">
				<section class="curvedRectBoxes" style="width:60%;margin-left:220px;height:300px;display:inline-block;vertical-align:top;text-align:left">
			<form name="f1" action="forgotpass3.php" method="post">
			<center>
			<label>Enter Seven digit code:</label>
			<input type="text" name="code" size="40" maxlength="40" placeholder="Enter verification code" required/></input><br><br>
			<label>Enter New Password:</label>
			<input type="password" name="pass1" size="40" maxlength="40" placeholder="Enter new password" required/></input><br><br>
			<label>Retype New Password:</label>
			<input type="password" name="re_pass1" size="40" maxlength="40" placeholder="Retype password" required/></input><br><br>
			<input type="hidden" name="h1" value="<?php echo $c; ?>" ></input>
			<input type="submit" name="submit" value="submit"></input>
			<input type="reset" name="reset" value="reset"></input>
			</center>
			</form>
				</section> 
			</section>
		</div>
<?php
				
			}
		else
			echo "Invalid email id For User";
	}
else if($c=="sp")
	{
		$q_out2=mysqli_query($lid,"SELECT s_id,s_email, s_fname ,s_pass FROM serviceprovider_tbl WHERE s_email='$a'");
		$q_out4=mysqli_query($lid,"SELECT count(*) FROM serviceprovider_tbl WHERE s_email='$a'");
		$r4=mysqli_fetch_array($q_out4);
		echo "No of rows: ".$r4[0].'</BR>'; 
		if($r4[0]==1)
			{
				$arr=mysqli_fetch_array($q_out2);
				$b=$arr[3];
				$b=sha1($b);
				echo "Randon number generated is : ".$string.'<BR>';
				echo "* Email functionality will be used for this purpose, currently we are only explaining the functional flow. ";
				$_SESSION['code'] = $string;
				$_SESSION['sel'] = $c;
				$_SESSION['USid'] = $arr[0];
?>
			<div>
			<section class="center" style="margin-top:10px;">
				<section class="curvedRectBoxes" style="width:60%;margin-left:220px;height:300px;display:inline-block;vertical-align:top;text-align:left">
			<form name="f1" action="forgotpass3.php" method="post">
			<center>
			<label>Enter Seven digit code:</label>
			<input type="text" name="code" size="40" maxlength="40" placeholder="Enter verification code" required/></input><br><br>
			<label>Enter New Password:</label>
			<input type="password" name="pass1" size="40" maxlength="40" placeholder="Enter new password" required/></input><br><br>
			<label>Retype New Password:</label>
			<input type="password" name="re_pass1" size="40" maxlength="40" placeholder="Retype password" required/></input><br><br>
			<input type="hidden" name="h1" value="<?php echo $c; ?>" ></input>
			<input type="submit" name="submit" value="submit"></input>
			<input type="reset" name="reset" value="reset"></input>
			</center>
			</form>
				</section> 
			</section>
		</div>
<?php
			}
		else
			echo "Invalid email id For Service Provider";
}
else
	echo "Invalid Selection: Select User or SP";

?>
