$(document).ready(function(){
	var xmlHttp
	$("#form_bg").hide();
	setTimeout( $('#form_bg').fadeIn(5000),5000);
	$("#login").click(function(){
		var name=$("#user").val();
		var password=$("#mima").val();
		if (name.length==0||password.length==0)
		  { 
		  	$("#text").hide();
		    $("#text").fadeIn();
		    document.getElementById("text").style.color="red";
			$("#text").text("用户名、密码不能为空！");		
	        setTimeout("$('#text').fadeOut()",5000);
		  return
		  }
		xmlHttp=GetXmlHttpObject()
		if (xmlHttp==null)
		  {
		  alert ("Browser does not support HTTP Request")
		  return
		  } 
		var url="login.php";
		url=url+"?nam="+name+"&passw="+password;
		url=url+"&sid="+Math.random();
		xmlHttp.onreadystatechange=stateChanged ;
		xmlHttp.open("GET",url,true);
		xmlHttp.send(null);
		$("#user").val("");
		$("#mima").val("");
		
	});
	$("#mima").keypress(function (event) {
    var key = event.which;
    if (key == 13) {
        $("#login").click(); //支持firefox,IE武校
        //$('input:last').focus();
        $("#login").focus();  //支持IE，firefox无效。
    }
    });
    $("#signup").click(function(){
		var name=$("#user").val();
		var password=$("#mima").val();
		if (name.length==0||password.length==0)
		  { 
		  	$("#text").hide();
		    $("#text").fadeIn();
		    document.getElementById("text").style.color="red";
			$("#text").text("用户名、密码不能为空！");		
	        setTimeout("$('#text').fadeOut()",5000);
		  return
		  }
		xmlHttp=GetXmlHttpObject()
		if (xmlHttp==null)
		  {
		  alert ("Browser does not support HTTP Request")
		  return
		  } 
		var url="signup.php";
		url=url+"?nam="+name+"&passw="+password;
		url=url+"&sid="+Math.random();
		xmlHttp.onreadystatechange=signupstateChanged ;
		xmlHttp.open("GET",url,true);
		xmlHttp.send(null);
		$("#user").val("");
		$("#mima").val("");
		
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
			$("#text").text("用户名密码错误,请重新登录！");		
	}
	setTimeout("$('#text').fadeOut()",5000);
	 } 
	}


	function signupstateChanged() 
	{ 
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	 { 
	 	var leng=(xmlHttp.responseText).length;
	 	var result=(xmlHttp.responseText).substring(leng-4, leng);
	 	if(result=="true"){
			$("#text").hide();
			$("#text").fadeIn();
			document.getElementById("text").style.color="red";
			$("#text").text("注册成功，请登录！");
	}
	else{
		$("#text").hide();
		$("#text").fadeIn();
		document.getElementById("text").style.color="red";
		$("#text").text("该账户已经存在，请重新注册！");		
	}
	setTimeout("$('#text').fadeOut()",5000);
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