<?php
echo <<<ttpod
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
<link rel="stylesheet" href="css.css" type="text/css" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
 <meta name="viewport" content="width=device-width, target-densitydpi=160dpi, initial-scale=1.0, maximum-scale=1, user-scalable=no, minimal-ui">
<meta name="viewport" content="width=device-width">

<title>在线云音乐解析</title></head><body>
	
	
	
<div class = "menu shadow">云音乐解析</div>
<div class = "list"><br>

<form action = "search.php" method = "GET">
<input type = "text" name = "keywords" placeholder ="单曲搜索 (官方api机制已更改，可能不可用)">
<input type = "submit" value = "GO"></form><br>
<form action = "mvSearch.php" method = "GET">
<input type = "text" name = "keywords" placeholder ="MV搜索 (稳定)" >
<input type = "submit" value = "GO"></form><br>
<form action = "albumSearch.php" method = "GET">
<input type = "text" name = "keywords" placeholder ="专辑搜索" >
<input type = "submit" value = "GO"></form>
</div>
<div class = "menu font top"><a target="_blank" href="https://github.com/Bruceau/wyytools">在GitHub上查看该项目</a><br><br>Copyright © 2017 By <a target="_blank" href="https://Bruceau.com">Bruce Au </a></div>
</body>
</html>
ttpod;
?>
