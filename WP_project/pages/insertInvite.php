<?php
		session_start();
		$userid = $_SESSION["userid"];
	
		error_reporting(E_ALL);
		ini_set('display_errors', '1');
		include("dbWrapper.php");
		$conId=connect_toDB();
	
		$divdt = $_POST['divmsg'];
		echo $divdt;
		$datacontent = explode("~",$divdt);

		$sel_sql = 'select u_id,e_id from user_event_tbl where u_id='.$userid.' and e_id='.$datacontent[1];
		echo "<br><br>".$sel_sql;
		if (!$res=mysqli_query($conId, $sel_sql)) 
			{
				echo mysqli_error($conId);
				exit;
			}
		else{
			if((mysqli_num_rows ($res) < 1))
			{	 	
				echo " NO rows in database ";
				$ins_sql = "insert into user_event_tbl(u_id,e_id) VALUES ('".$userid."','".$datacontent[1]."');";
				echo $ins_sql;
				if(!$res = mysqli_query ($conId, $ins_sql))
				{
					echo mysqli_error($conId);
					exit;
				}
				else
				{
					echo "Insert successfully";
				} 
			}
			$divdt = $_POST['divmsg'];
			$update_img = "update user_event_tbl SET own_invite=NULL, cust_invite='".addslashes($datacontent[0])."' WHERE u_id='".$userid."' AND e_id='".$datacontent[1]."';";
			if(!$res = mysqli_query ($conId, $update_img))
			{
				echo mysqli_error($conId);
				exit;
			}
			else
			{
				echo "updated successfully";
			}
		}
	?>