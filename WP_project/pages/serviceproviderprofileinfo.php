<?php
					if(isset($_REQUEST["edit"]))
						showSPProfileInfo($conId, $spId, "e" );
					elseif(isset($_REQUEST["save"]))
						saveSPProfileInfo($conId, $spId);
					else
						showSPProfileInfo($conId, $spId, "v");
?>
<?php
function showSPProfileInfo($conId, $sid, $statusflag)
{
	$infoSection = '<section id="myProfileInfo" class="subText">';
	
	$sel_sql = "select sp_first_name,sp_last_name,c_email,c_name, c_street, c_city, c_state, c_zip, c_contact from serviceprovider_tbl where s_id=".$sid.";";
	
	if (! $res=mysqli_query($conId, $sel_sql)) 
	{
		echo mysqli_error($conId);
		exit;
	}
	else 
	{
		$requireval = " "; $starval =" ";
		if(mysqli_num_rows($res) == 0)
		{
			$infoSection .= '<label>Sorry No user information found.</label>';
		}
		else
		{
			
			if($statusflag == "v")
			{
				$classval = "class=\"labelTreat\"" ;
				$disableval = "disabled";
				$faction = "myinfo.php?edit=1&ut=sp";
			
			}
			else
			{
				$classval = "";
				$disableval = "";
				$faction = "myinfo.php?save=1&ut=sp";
				
			}
			$replaceCharList = array("sp_","c_","_");
			$replaceCharListfordiv = array(" ");
			$userinfoArr = mysqli_fetch_assoc($res);
			
			$uname = $userinfoArr["sp_first_name"]." ".$userinfoArr["sp_last_name"];
			$infoSection .= '<label class="mainHeading">Welcome, '.ucwords($uname).'</label><hr>';
			
			$infoSection .=	'<form action="'.$faction.'" method="post"><table  id="myProfileInfoTbl" cellspacing="0" cellpadding="0" border="0" style="width:60%;margin:10px">';
			
			foreach($userinfoArr as $key => $elem)
			{
				if(($key == "sp_first_name") || ($key == "sp_zip"))
				{
					$starval = "*";
					$requireval ="required";
				}
				else
				{
					$starval = "";
					$requireval ="";
				}
				$infoSection .= '<tr>
						<td style="width:20%;text-align:left"><label>'.$starval.ucwords(str_replace($replaceCharList," ",$key)).':</label></td>
						<td style="width:80%"><input '.$classval.' type="text" id="'.str_replace($replaceCharListfordiv," ",$key).'" name="'.str_replace($replaceCharListfordiv," ",$key).'" value="'.$elem.'" width="100" '.$disableval.' '.$requireval.' /></td>
					 </tr>';
			}
				
		}
		if($statusflag == "v")
			$infoSection .= '		<tr><td><input type="submit" class="buttonCSS" value="Edit" /></td></tr>';
		elseif($statusflag == "e")
			$infoSection .= '		<tr><td><input type="submit" class="buttonCSS" value="Save" /></td></tr>';
		else	
			echo 1;
		$infoSection .= '					</table></form>
						</section>';	
		$infoSection .= '<form method="post" action="deletespacct.php">
				<input type="submit" class="buttonCSS" value="Delete Account" />
		 </form>';
		echo $infoSection;
	}		
}
function saveSPProfileInfo($conId, $sid)
{
	$sqlQuery = 'update serviceprovider_tbl SET
					sp_first_name = "'.$_REQUEST["sp_first_name"].'", sp_last_name ="'.$_REQUEST["sp_last_name"].'", c_email ="'.$_REQUEST["c_email"].'",c_name ="'.$_REQUEST["c_name"].'",c_street ="'.$_REQUEST["c_street"].'",c_city ="'.$_REQUEST["c_city"].'",c_state = "'.$_REQUEST["c_state"].'",c_zip ="'.$_REQUEST["c_zip"].'",c_contact = "'.$_REQUEST["c_contact"].'" where s_id='.$sid;
	
	if (! $res=mysqli_query($conId, $sqlQuery)) 
		{
			echo mysqli_error($conId);
			exit;
		}
		else 
		{
			header('Location:myinfo.php?ut=sp');
			
		}
}
?>