<!DOCTYPE html>
<html lang="en" >
<head>
<title>Love house</title>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />

    <meta name="author" content="Script Tutorials" />
    <!-- add styles -->
    <link href="css/least.min.css" rel="stylesheet" type="text/css" />
    <link href="css/main.css" rel="stylesheet" type="text/css" />

    <!-- add scripts -->
    <!-- 禁止图片另存为 -->
    <script>
	document.oncontextmenu = function()
	{
	alert("本站禁止图片另存为");//弹出提示:"点击了鼠标右键";
	return false;//屏蔽掉的右键菜单
	}
	</script>
    <script src="js/jquery.min.js"></script>
    <script src="js/least.min.js"></script>
    <script src="js/jquery.lazyload.js"></script>
</head>
<body>

    <header>
    	<?php
    		$num=$_GET["num"];
    		$titles=array("艺术照","云南","苏州","西安","扬州");
    		echo "<h2>{$titles[$num-1]}</h2>";
    	?>
    </header>

    <section>
        <ul id="gallery">
            <li id="fullPreview"></li>
              <?php include 'words.inc.php';
                	$images=array("yishu","yunnan","suzhou","xian","yangzhou");
                	$dir = "{$images[$num-1]}/";
                    $count=0;
                    if (is_dir($dir))
                    {
                    if ($dh = opendir($dir))
                    {
                    while (($file = readdir($dh)) !== false)
                    {
                    $count++;
                    }
                    closedir($dh);
                    }
                    }
                    for($i=0;$i<$count;$i++){
                        $thisword=$words[$i%30];
                        echo "<li> <a href=\"{$images[$num-1]}/p",$i,".jpg\"></a> <img data-original=\"{$images[$num-1]}/t",$i,".jpg\" src=\"img/effects/white.gif\" alt=\"Photo ",$i,"\" /> <div class=\"overLayer\"></div> <div class=\"infoLayer\"><ul> <li><h2>Photo ",$i,"</h2></li> <li><p>View</p></li><li><p>it</p></li></ul></div> <div class=\"projectInfo\">",$thisword,"</div> </li> ";

                    }
                    
                ?>

        </ul>
    </section>
</body>
</html>