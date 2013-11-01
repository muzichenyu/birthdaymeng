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

$result = mysql_query("SELECT * FROM users where name='$name'");

while($row = mysql_fetch_array($result))
  {
  if($password==$row['password']){
      $response="true";
  }
  }
mysql_close($con);
echo $response; 
