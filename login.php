<?php

$name=$_GET["nam"];
$password=$_GET["passw"];
if(($name=="1"&&$password=="728huang625")||($name=="2"&&$password=="sunmeng10806321")){
      $response="true";
      echo $response;  // 找到元素
  }
  else{
  	$response="false";
      echo $response; 
  }
