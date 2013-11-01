<?php

$name=$_GET["nam"];
$password=$_GET["passw"];
$response="false";
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("birthday", $con);

$sql="SELECT * FROM users where name='$name'";
$result=mysql_query($sql,$con); 

if(mysql_num_rows($result)==0){
	$sql="INSERT INTO users (name, password) VALUES ( '$name', '$password')";
	$response="true";
	if (!mysql_query($sql,$con))
		  {
		  die('Error: ' . mysql_error());
		 }

}
mysql_close($con);
echo $response; 