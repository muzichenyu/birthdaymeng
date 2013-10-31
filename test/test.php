
<!DOCTYPE php>
<php>
<head>
<title>Love house</title>
<meta http-equiv="Content-Type" content="text/php;charset=utf-8"/>
<style type="text/css">
body, td, ul, li { margin:0; padding:0 }
table { border-collapse: collapse; border-spacing:0 }
#container { width:800px; height:200px; position:relative; overflow: hidden; margin:0 auto; }
#scroller { position:absolute; }
#page { position: absolute; float:right; left:710px; top:180px;}
#page li { float:left; cursor:pointer; list-style:none; width:15px; height:15px; line-height:15px; font-family:Arial; font-size:12px; margin:1px; text-align:center;background:url("../images/flashbutton.gif") no-repeat scroll -15px 0 transparent;}
#page li.on {background:url("../images/flashbutton.gif") no-repeat scroll 0 0 transparent;color:#FFFFFF;}
h1 {
  font-family: "宋体", "微软雅黑";
  font-size:        300%;
  text-shadow: 5px 5px 5px #FF0000;
  color:            #66FF66;
  position:absolute;
	top:70px;
	left:100px;
	width:400px;
	height:100px;
}
</style>
<link rel="stylesheet" type="text/css" href="style.css"/>
<link rel="stylesheet" type="text/css" href="slickmenu.css"/>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="jslickmenu.js"></script>
<script type="text/javascript" src="script.js"></script>
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
			<li><a href="yishu/index.php">
				<img src="../images/item-01.jpg" alt="艺术照" />
			</a></li>
			<li><a href="yunan/index.php">
				<img src="../images/item-02.jpg" alt="云南" />
			</a></li>
			<li><a href="suzhou/index.php">
				<img src="../images/item-03.jpg" alt="苏州" />
			</a></li>
			<li><a href="xian/index.php">
				<img src="../images/item-04.jpg" alt="西安" />
			</a></li>
			<li><a href="yangzhou/index.php">
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
var QQ = function() {
	// 公用函数
	function T$(id) { return document.getElementById(id); }
	function T$$(root, tag) { return (root || document).getElementsByTagName(tag); }
	function $extend(des, src) { for(var p in src) { des[p] = src[p]; } return des; }
	function $each(arr, callback, thisp) {
		if (arr.forEach) {arr.forEach(callback, thisp);} 
		else { for (var i = 0, len = arr.length; i < len; i++) callback.call(thisp, arr[i], i, arr);}
	}
	function currentStyle(elem, style) {
		return elem.currentStyle || document.defaultView.getComputedStyle(elem, null);
	}
	// 缓动类
	var Tween = {
		Quart: {
			easeOut: function(t,b,c,d){
				return -c * ((t=t/d-1)*t*t*t - 1) + b;
			}
		},
		Back: {
			easeOut: function(t,b,c,d,s){
				if (s == undefined) s = 1.70158;
				return c*((t=t/d-1)*t*((s+1)*t + s) + 1) + b;
			}
		},
		Bounce: {
			easeOut: function(t,b,c,d){
				if ((t/=d) < (1/2.75)) {
					return c*(7.5625*t*t) + b;
				} else if (t < (2/2.75)) {
					return c*(7.5625*(t-=(1.5/2.75))*t + .75) + b;
				} else if (t < (2.5/2.75)) {
					return c*(7.5625*(t-=(2.25/2.75))*t + .9375) + b;
				} else {
					return c*(7.5625*(t-=(2.625/2.75))*t + .984375) + b;
				}
			}
		}
	}

	// 主类构造函数
	var scrollTrans = function(cid, sid, count, config) {
		var self = this;
		if (!(self instanceof scrollTrans)) {
			return new scrollTrans(cid, sid, count, config);
		} 
		self.container = T$(cid);
		self.scroller = T$(sid);
		if (!(self.container || self.scroller)) { 
			return;
		} 
		self.config = $extend(defaultConfig, config || {});
		self.index = 0;
		self.timer = null;
		self.count = count;
		self.step = self.scroller.offsetWidth / count;
	};
	
	// 默认配置
	var defaultConfig = {
		trigger: 1, // 触发方式1:click other: mouseover
		auto: true, // 是否自动切换
		tween: Tween.Back.easeOut, // 默认缓动类
		Time: 10, // 滑动延时
		duration: 50,	// 切换时间
		pause: 3000, // 停顿时间
		start: function() {}, // 切换开始执行函数
		end: function() {} // 切换结束执行函数
	};

	scrollTrans.prototype = {
		constructor: scrollTrans,
		transform: function(index) {
			var self = this;
			index == undefined && (index = self.index);
			index < 0 && (index = self.count - 1) || index >= self.count && (index = 0);			
			self.time = 0;
			self.target = -Math.abs(self.step) * (self.index = index);
			self.begin = parseInt(currentStyle(self.scroller)['left']);
			self.change = self.target - self.begin;
			self.duration = self.config.duration;
			self.start();
			self.run();
		},

		run: function() {
			var self = this;
			clearTimeout(self.timer);
			if (self.change && self.time < self.duration) {
				self.moveTo(Math.round(self.config.tween(self.time++, self.begin, self.change, self.duration)));
				self.timer = setTimeout(function() {self.run()}, self.config.Time);
			} else {
				self.moveTo(self.target);
				self.config.auto && (self.timer = setTimeout(function() {self.next()}, self.config.pause));
			}
		},

		moveTo: function(i) {
			this.scroller.style.left = i + 'px';
		},

		next: function() {
			this.transform(++this.index);
		}
	};

	return {
		scroll: function(cid, sid, count, config) {
				window.onload = function() {
					var frag = document.createDocumentFragment(),
						nums = [];
					for (var i = 0; i < count; i++) {
						var li = document.createElement('li');
						(nums[i] = frag.appendChild(document.createElement('li'))).innerphp = i + 1;
					}
					T$('page').appendChild(frag);

					// 调用主类
					var st = scrollTrans(cid, sid, count, config);
					$each(nums, function(o, i) {
						o[st.config.trigger == 1 ? 'onclick' : 'onmouseover'] = function() { o.className = 'on'; st.transform(i); }
						o.onmouseout = function() { o.className = ''; st.transform();}
					});
					st.start = function() {
						$each(nums, function(o, i) {
							o.className = st.index == i ? 'on' : '';
						});	
					};
					st.transform();
				}
		}
	}
}();
	
QQ.scroll('container' /*外部容器ID*/, 'scroller'/*滑动容器ID*/, 5/*切换图片数目*/, {trigger: 0} /*默认配置*/);
</script>
</body>
</php>