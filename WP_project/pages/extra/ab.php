<script type="text/javascript">
function changeelement(host)
{
	
			alert(host);
		document.getElementById("label2").innerHTML = host;
		return document.getElementById("myDesign").innerHTML;
}
</script>
<?php
/*<section  id="bgDesign" style="margin-top:30px;display:inline-block;vertical-align:top;text-align:right; background:url('../images/kids2_img.jpg') no-repeat; background-size:cover;">	
				<div class="wordwrap" style="text-align:center;width:40%;height:45%;margin-left:50%;margin-top:15%;">
				    <label class="mainHeading" id="label1" style="font-size:60px;color:FF9999;"> EVENT NAME </label> 
				</div>
			
				<div style="text-align:center;width:40%;height:auto;margin-left:10%;margin-top:-3%;">
				<p class="invitelabel"> Host Name :
					<label class="invitelabel" id="label2"> HOST NAME HERE </label><br>
				<p class="invitelabel">Contact Number :
					<label class="invitelabel" id="label3" > CONTACT NUMBER </label> <br>
				<p class="invitelabel">Venue :
					<label class="invitelabel" id="label4" > LOCATION FOR OCASSION </label> <br>
				<p class="invitelabel"> Date & Time:
					on <label class="invitelabel" id="label6" > DATE & </label> 
					at <label class="invitelabel" id="label5" > TIME  </label> <br>
				</div>
			</section>*/
include("dbWrapper.php");
	$conId=connect_toDB();
echo $_REQUEST["hostTxt"]."===";
echo $_REQUEST["lid"];

$sel_sql = "select * from ".$db.".invite_tbl where i_id=".$_REQUEST["lid"].";";
		
		if (! $res=mysqli_query($conId, $sel_sql)) 
		{
			echo mysqli_error($conId);
			exit;
		}
		else 
		{
			
				while($greeting = mysqli_fetch_assoc($res))
				{
					
					echo '<label id="myDesign" name="myDesign" onclick="return changeelement(\''.$_REQUEST["hostTxt"].'\')";>'.$greeting["i_desc"].'</label>';	
				}
				
		}
		
?>