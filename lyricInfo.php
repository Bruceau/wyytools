<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
   <link rel="stylesheet" href="css.css" type="text/css" />
<meta name="viewport" content="width=device-width, content="width=device-width,initial-scale=1" /><title>网易云音乐</title></head><html><body>
<?php
require('curl.class.php');
$id = $_GET['id'];
$name = $_GET['name'];
if($id == false){

exit('<div class =\'error\'>错误:ID未传入！</div>');


}
$json = json_decode(lyric($id));
//print_r($json);

$lyric = str_replace('[','<hr />[',$json->lrc->lyric);
if($lyric == false){

exit('<div class =\'error\'>错误:暂无歌词！</div>');


}


echo<<<html
<div class ='menu shadow'>歌曲: {$name}</div><div class ='lyric'>
{$lyric}
</div>
<div class = "menu font top"> Copyright © 2017 Powered By Bruce Au </div>
</body>
</html>
html;
