<!DOCTYPE HTML>
<html>
<head>
<title>Love house</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css3" href="cs1.css">
<script src="Jquery.js"></script>
<script> 
$(document).ready(function(){
	var xmlHttp
	$("#form_bg").hide();
	setTimeout( $('#form_bg').fadeIn(5000),5000);
	$("#button").click(function(){
		var name=$("#user").val();
		var password=$("#mima").val();
		if (password.length==0)
		  { 
		  return
		  }
		xmlHttp=GetXmlHttpObject()
		if (xmlHttp==null)
		  {
		  alert ("Browser does not support HTTP Request")
		  return
		  } 
		  $("#text").hide();
		$("#text").fadeIn();
		document.getElementById("text").style.color="red";
			$("#text").text(name);	
		var url="login.php";
		url=url+"?nam="+name+"&passw="+password;
		url=url+"&sid="+Math.random();
		xmlHttp.onreadystatechange=stateChanged ;
		xmlHttp.open("GET",url,true);
		xmlHttp.send(null);
		
	});
	$("#mima").keypress(function (event) {
    var key = event.which;
    if (key == 13) {
        $("#button").click(); //支持firefox,IE武校
        //$('input:last').focus();
        $("#button").focus();  //支持IE，firefox无效。
    }
    });

	function stateChanged() 
	{ 
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	 { 
	 	var leng=(xmlHttp.responseText).length;
	 	var result=(xmlHttp.responseText).substring(leng-4, leng);
	 	if(result=="true"){
			window.location.href="test/test.php";  // 找到元素
	}
	else{
		$("#text").hide();
		$("#text").fadeIn();
		document.getElementById("text").style.color="red";
			$("#text").text("用户名密码错误，请重新登录！");		
	}
	setTimeout("$('#text').fadeOut()",3000);
	 } 
	}

	function GetXmlHttpObject()
	{
	var xmlHttp=null;
	try
	 {
	 // Firefox, Opera 8.0+, Safari
	 xmlHttp=new XMLHttpRequest();
	 }
	catch (e)
	 {
	 // Internet Explorer
	 try
	  {
	  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
	  }
	 catch (e)
	  {
	  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	 }
	return xmlHttp;
	}
	
});
</script>
</head>
<body id="bod">
<div id="web_bg" style="position:absolute; width:99%; height:95%; z-index:-1"> 
<img style="position:absolute;" src="images/firstbg.jpg" height="100%" width="100%" />  
</div>
<h1>欢迎乖乖、宝宝</h1>
<div id="form_bg">
	<form height="100%" width="100%">
	<nav width="100%">
		<input id="text1" type="name" readonly value="身份"><select id="user">
		<option value="1">乖  乖</option>
		<option value="2">宝  宝</option>
		</select>
	</nav>
	<nav width="100%">
		<input id="text2" readonly type="name" value="密码"><input id="mima" type="password">
	</nav>
		<input id="button" type="button" value="登   陆">
		<p id="text" color="red"></p>
	</form>
</div>
</body>
</html>