<!-- Event Form -->
		
		<?php
				//Database connection
		
				error_reporting(E_ALL);
				ini_set('display_errors', '1');
				//include("connection.inc.php");					// change it 
			//	$=connect();
				//$db= "file_manager";	
				if(isset($_POST["ename"]))
				{
					$Event = $_POST["ename"];
					$sql="INSERT INTO event_tbl(Event_Name)VALUES('$Event')";
					$res = send_sql ($sql, $conId);
				}
				//echo "Event Name is :". $Event;
				
				$select_sql = "SELECT * FROM event_tbl";
				echo "Selected rows are :".$select_sql;
				$rows = send_sql ($select_sql, $conId);
	    								
				function send_sql($sql, $link) 
				{
					if (! ($res = mysqli_query($link,$sql)) )
					{
						echo mysqli_connect_error();
						exit;
					}
					return $res;
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
			<form action="EventAdmin.php" method="POST" >
					<label> Enter Event Name : </label>
					<input type="text" name="ename" required/> <br/>
					<input type="submit" name="Insertbtn" value="Add"/>  
			</form>	
						
				<table width="200" border="1" cellpadding="5" cellspacing="5">
				<tr> 
				<th> Event_id </th>
				<th> Event_Name </th>		
				<th> </th>
				<th> </th>
				</tr> 
			<h1> List of Events </h1>
			<!--<ul style="list-style-type:none; display:inline;">-->
			<?php
				 while($events = mysqli_fetch_array($rows)){
				//echo "<li>$events[Event_id]<li> <li>$events[Event_Name]</li> <li> <a href='Edit.php?edit=$events[Event_id]'> Edit </a> </li> <li> <a href='DeleteAdmin.php?del=$events[Event_id]'> Delete </a> </li> </br> ";
					echo "<tr>" ;
					echo "<td>".$events['e_id']."</td>";
					echo "<td>".$events['e_Name']."</td>";
					echo "<td><a href='Edit.php?edit=$events[Event_id]'> Edit </a></td>";
					echo "<td><a href='Delete.php?del=$events[Event_id]'> Delete </a> </td>";
					echo "</tr>";
				}
			?>
			<!--</ul>-->
			</body>
</html>
			
			<!--?php	
				while($events = mysqli_fetch_array($rows)) {
					echo "<tr>" ;
					echo "<td>".$events['Event_id']."</td>";
					echo "<td>".$events['Event_Name']."</td>";
					echo "</tr>";
				}
			"<table>"; -->
	