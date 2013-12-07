$(document).ready(function(){
	var xmlHttp
	$("#form_bg").hide();
	setTimeout( $('#form_bg').fadeIn(5000),5000);

	/*登录功能的实现*/
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
		/*var url="login.php";
		url=url+"?nam="+name+"&passw="+password;
		url=url+"&sid="+Math.random();
		xmlHttp.onreadystatechange=stateChanged ;
		xmlHttp.open("GET",url,true);
		xmlHttp.send(null);*/
		/*xmlhttp.open("POST","login.php",true);
		xmlHttp.onreadystatechange=stateChanged ;
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("nam=muzichenyu&passw=728huang625");*/
		var sParams ='';
		sParams = addPostParam(sParams,"nam",name);
		sParams = addPostParam(sParams,"passw",password);
		xmlHttp.open("post", "login.php", true);
		xmlHttp.onreadystatechange=stateChanged ;
		xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xmlHttp.send(sParams);
		$("#user").val("");
		$("#mima").val("");
		
	});

	function addPostParam(sParams, sParamName, sParamValue){

         if(sParams.length>0){sParams += "&"};

         return sParams +encodeURIComponent(sParamName) + "="

          + encodeURIComponent(sParamValue);

}
	/*当在密码处回车时的响应*/
	$("#mima").keypress(function (event) {
    var key = event.which;
    if (key == 13) {
        $("#login").click(); //支持firefox,IE武校
        //$('input:last').focus();
        $("#login").focus();  //支持IE，firefox无效。
    }
    });

   /*注册功能的实现*/
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
		var sParams ='';
		sParams = addPostParam(sParams,"nam",name);
		sParams = addPostParam(sParams,"passw",password);
		xmlHttp.open("post", "signup.php", true);
		xmlHttp.onreadystatechange=signupstateChanged ;
		xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xmlHttp.send(sParams);
		$("#user").val("");
		$("#mima").val("");
		
	});

	/*login.php的状态返回的监听与响应*/
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
			$("#text").text("用户名密码错误,请重新登录！"+xmlHttp.responseText);		
	}
	setTimeout("$('#text').fadeOut()",5000);
	 } 
	}


    /*signup.php的状态返回的监听与响应*/
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


     /*实例化Ajax的xmlHttp对象*/
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