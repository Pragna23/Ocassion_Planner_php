<!-- EventAdmin Form -->
		<?php
			//include("dbWrapper.php");
			$conId=connect_toDB();
			$sel_sql = "select * from event_tbl ";
				
			if (!$res=mysqli_query($conId, $sel_sql)) 
			{
				echo mysqli_error($conId);
				exit;
			}
			else
			{
				echo ' <table width="200" border="1" cellpadding="5" cellspacing="5">';
				echo "<tr>"; 
					echo '<th> Event_id </th>';
					echo '<th> Event_Name </th>';		
					echo '</tr>';
				while($events = mysqli_fetch_assoc($res))
				{
					
					
					echo "<tr>" ;
					echo "<td>".$events['e_id']."</td>";
					echo "<td>".$events['e_name']."</td>";
					echo "</tr>";
				}
				echo "</table>";
			}
			if(isset($_REQUEST["saveevent"]))
			{
				$ins_sql ='INSERT INTO event_tbl(e_name)VALUES('.$events["e_name"].')';
										
				if(!$res = mysqli_query ($conId, $ins_sql))
				{
					echo mysqli_error($conId);
					exit;
				}
				else
				{
					echo "Insert successfully";
				} 
				header('Location:admininfo.php');
			}
			
		?>	
		<html>
			<head>
				<style>
					table{
						border-collapse : collapse;
					}
				</style>
			</head>
			<body>
			<form action="EventAdmin.php?saveevent=1" method="POST" >
					<label> Enter Event Name : </label>
					<input type="text" name="ename" required/> <br/>
					<input type="submit" name="Insertbtn" value="Add"/>  
			</form>	
				
			</body>
	</html>
	