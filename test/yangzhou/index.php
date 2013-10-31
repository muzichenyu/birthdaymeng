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
    <script src="js/jquery.min.js"></script>
    <script src="js/least.min.js"></script>
    <script src="js/jquery.lazyload.js"></script>
</head>
<body>
    <header>
        <h2>扬州</h2>
    </header>

    <section>
        <ul id="gallery">
            <li id="fullPreview"></li>

              <?php include '../words.inc.php';
                    
                    for($i=0;$i<54;$i++){
                        $thisword=$words[$i%30];
                        echo "<li> <a href=\"images/p",$i,".jpg\"></a> <img data-original=\"images/t",$i,".jpg\" src=\"img/effects/white.gif\" alt=\"Photo ",$i,"\" /> <div class=\"overLayer\"></div> <div class=\"infoLayer\"><ul> <li><h2>Photo ",$i,"</h2></li> <li><p>View</p></li><li><p>it</p></li></ul></div> <div class=\"projectInfo\">",$thisword,"</div> </li> ";

                    }
                    
                ?>

        </ul>
    </section>
</body>
</html>