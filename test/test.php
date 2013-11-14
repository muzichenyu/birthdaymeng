<!DOCTYPE php>
<php>
<head>
<title>Love house</title>
<meta http-equiv="Content-Type" content="text/php;charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="testCSS/cs.css"/>
<link rel="stylesheet" type="text/css" href="testCSS/style.css"/>
<link rel="stylesheet" type="text/css" href="testCSS/slickmenu.css"/>
<script type="text/javascript" src="testJS/jquery.js"></script>
<script type="text/javascript" src="testJS/jslickmenu.js"></script>
<script type="text/javascript" src="testJS/script.js"></script>
<script type="text/javascript" src="testJS/scroller.js"></script>
</head>
<body id="mainbody">
<embed id="bofang" src="../musi.mp3" autostart="true" hidden="true" loop="false" vspace="1" width="1" height="1" hspace="1">
<div id="parent">
	<div id="messageparent">
	    <div id="messagehead">
	    	<h2>心路历程，每天的问候</h2>
	    </div>
	    <div id="messagemid">
	    	<pre>宝宝            乖乖</pre>
	    </div>
		<div id="message">
		    <?php
			$file=fopen("message.txt","r") or exit("Unable to open file!");
			while (!feof($file)) 
			  { 
			  echo fgetc($file); 
			  }
			fclose($file);
			?>

	    </div>
    </div>

	<div id="wrapper">
		<div id="container">
			<div id="web_bg" style="position:absolute; width:99%; height:95%; z-index:2000; text-align:center"> 
			<h1>乖乖、宝宝的世界</h1> 
			</div>
			<table id="scroller" >
				<tr>
					<td><img src="../images/slide1.jpg" /></td>
					<td><img src="../images/slide2.jpg" /></td>
					<td><img src="../images/slide3.jpg" /></td>
					<td><img src="../images/slide4.jpg" /></td>
					<td><img src="../images/slide5.jpg" /></td>
				</tr>
			</table>
			<ul id="page"></ul>
		</div>

		<p>相识后的足迹.</p>

		<div id="menu">
			<ul>
				<li><a href="photos/index.php?num=1">
					<img src="../images/item-01.jpg" alt="艺术照" />
				</a></li>
				<li><a href="photos/index.php?num=2">
					<img src="../images/item-02.jpg" alt="云南" />
				</a></li>
				<li><a href="photos/index.php?num=3">
					<img src="../images/item-03.jpg" alt="苏州" />
				</a></li>
				<li><a href="photos/index.php?num=4">
					<img src="../images/item-04.jpg" alt="西安" />
				</a></li>
				<li><a href="photos/index.php?num=5">
					<img src="../images/item-05.jpg" alt="扬州" />
				</a></li>
			</ul>
		</div>

		<p>生日快乐</p>

		<video id="myvideo" width="600" height="450" controls="controls">
		  <source src="../1.ogg" type="video/ogg">
		  <source src="../movie.webm" type="video/webm">
		</video>

	</div>
</div>

<script>
QQ.scroll('container' /*外部容器ID*/, 'scroller'/*滑动容器ID*/, 5/*切换图片数目*/, {trigger: 0} /*默认配置*/);
</script>
</body>
</php>