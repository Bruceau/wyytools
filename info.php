<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
   <link rel="stylesheet" href="css.css" type="text/css" />
<meta name="viewport" content="width=device-width, content="width=device-width,initial-scale=1" /><title>网易云音乐</title></head><html><body>
<?php
require('curl.class.php');
$id = $_GET['id'];
if($id == false){

exit('<div class =\'error\'>错误:ID未传入！</div>');


}
$json = json_decode(music_info($id));
//print_r($json);

$s = round(($json->songs['0']->duration/1000),0);
$m = round(($s/60),0);
$s = $s % 60;
$time = $m.'分'.$s.'秒';
echo<<<html
<div class ='menu shadow'>歌曲: {$json->songs['0']->name}</div><div class ='list'>
<img src= "{$json->songs['0']->album->picUrl}" alt = "{$json->songs['0']->name}"><hr />
<audio controls="controls">
<source src="{$json->songs['0']->mp3Url}" />
</audio><hr />
<a href ="{$json->songs['0']->mp3Url}">下载MP3</a><m>(时长:{$time}  mp3)</m><hr />
<a href ="lyricInfo.php?id={$id}&name={$json->songs['0']->name}">查看歌词</a><m>(时长:{$time}  LRC)</m>
html;

if($json->songs['0']->mvid == true){
echo <<<html
<hr />
<a href ="mvInfo.php?id={$json->songs['0']->mvid}">查看M V</a><m>(时长: {$time}  mp4)</m>
html;
}

echo <<<html
</div><br>
<div class = "menu font top"> Copyright © 2017 Powered By Bruce Au </div><br>
</body>
</html>
html;
