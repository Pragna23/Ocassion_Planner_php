<?php
include("dbWrapper.php");
$conId=connect_toDB();
// We didn't check $_POST['password'], it could be anything the user wanted! For example:
$_POST['username'] = addslashes('abc@gmail.com');
$_POST['password'] = addslashes("' OR ''='");

// Query database to check if there are any matching users
$query = "SELECT * FROM userinfo_tbl WHERE u_email='{addslashes($_POST['username'])}' AND u_pass='{addslashes($_POST['password'])}'";
mysql_query($query);

// This means the query sent to MySQL would be:
echo $query;
?>