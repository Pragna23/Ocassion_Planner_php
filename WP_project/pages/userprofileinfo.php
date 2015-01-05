<?php
					if(isset($_REQUEST["edit"]))
						showUserProfileInfo($conId, $userId, "e" );
					elseif(isset($_REQUEST["save"]))
						saveUserProfileInfo($conId, $userId);
					else
						showUserProfileInfo($conId, $userId, "v");
?>
<?php
function showUserProfileInfo($conId, $uid, $statusflag)
{
	$infoSection = '<section id="myProfileInfo" class="subText">';
	
	$sel_sql = "select u_first_name,u_last_name,u_street,u_city,u_state,u_zip,u_contact from userinfo_tbl where u_id=".$uid.";";
	
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
				$faction = "myinfo.php?edit=1&ut=u";
			
			}
			else
			{
				$classval = "";
				$disableval = "";
				$faction = "myinfo.php?save=1&ut=u";
				
			}
			$replaceCharList = array("u_","_");
			$replaceCharListfordiv = array(" ");
			$userinfoArr = mysqli_fetch_assoc($res);
			
			$uname = $userinfoArr["u_first_name"]." ".$userinfoArr["u_last_name"];
			$infoSection .= '<label class="mainHeading">Welcome, '.stripslashes(ucwords($uname)).'</label><hr>';
			
			$infoSection .=	'<form action="'.$faction.'" method="post"><table  id="myProfileInfoTbl" cellspacing="0" cellpadding="0" border="0" style="width:60%;margin:10px">';
			$maxlength = "";
			foreach($userinfoArr as $key => $elem)
			{
				if(($key == "u_first_name") || ($key == "u_zip"))
				{
					$starval = "*";
					$requireval ="required";
					if($key == "u_zip")
					{
						$maxlength = "maxlength=\"5\"";
					}
				}
				else
				{
					$starval = "";
					$requireval ="";
				}
				$infoSection .= '<tr>
						<td style="width:20%;text-align:left"><label>'.$starval.ucwords(str_replace($replaceCharList," ",$key)).':</label></td>
						<td style="width:80%"><input '.$classval.' type="text" id="'.str_replace($replaceCharListfordiv," ",$key).'" name="'.str_replace($replaceCharListfordiv," ",$key).'" value="'.$elem.'" width="100" '.$disableval.' '.$maxlength.''.$requireval.' /></td>
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
		$infoSection .= '<form method="post" action="deleteacct.php">
								<input type="submit" class="buttonCSS" value="Delete Account" />
						 </form>';
		echo $infoSection;
	}		
}
function saveUserProfileInfo($conId, $uid)
{
	$sqlQuery = 'update userinfo_tbl SET
					u_first_name = "'.addslashes(strip_tags($_REQUEST["u_first_name"])).'", u_last_name ="'.addslashes(strip_tags($_REQUEST["u_last_name"])).'", u_street ="'.addslashes(strip_tags($_REQUEST["u_street"])).'",u_city ="'.addslashes(strip_tags($_REQUEST["u_city"])).'",u_state = "'.addslashes(strip_tags($_REQUEST["u_state"])).'",u_zip ="'.addslashes(strip_tags($_REQUEST["u_zip"])).'",u_contact = "'.addslashes($_REQUEST["u_contact"]).'" where u_id='.$uid;
	
	if (! $res=mysqli_query($conId, $sqlQuery)) 
		{
			echo mysqli_error($conId);
			exit;
		}
		else 
		{
			header('Location:myinfo.php?ut=u');
		}
}
?>