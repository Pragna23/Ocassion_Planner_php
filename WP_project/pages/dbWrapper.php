<?php
  $db_Host= "localhost";
  $db_Username= "evplanner";
  $db_Password= "stevens1234";
  $db = "plannerdbtest";
  function connect_toDB()
  {		
	global $db_Host,$db_Username, $db_Password,$db;
	if(! $connectionId = mysqli_connect("$db_Host","$db_Username","$db_Password", "$db"))
	{
		echo "could not connect to database".$db_Host."<BR>";
		exit;
	}
	
	return $connectionId;
  }	
  function disconnect ($connectionId)
  {
		if (isset ($connectionId))
			mysqli_close($connectionId);
		unset ($connectionId);
  }
?>