<?php 
	session_start();
		if(isset($_SESSION["aid"]))
			$adminId = $_SESSION["aid"];
		include("dbWrapper.php");
		$conId=connect_toDB();
	
	if(isset($_REQUEST["granta"]))
	{
		if($_REQUEST["granta"] == "Y")
		{
			$upd_sql =  'update serviceprovider_tbl SET sp_grant="Y" where s_id='.$_REQUEST["spid"];
			if (! $res=mysqli_query($conId, $upd_sql)) 
			{
				echo mysqli_error($conId);
				exit;
			}
			else 
			{
				header('Location:admininfo.php');
				
			}
		}
		elseif($_REQUEST["granta"] == "N")
			echo "hello1";
		else
			echo "1";
	}
?>