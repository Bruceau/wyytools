<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
   <link rel="stylesheet" href="css.css" type="text/css" />
<meta name="viewport" content="width=device-width, content="width=device-width,initial-scale=1" />
<?php
require('curl.class.php');
$id = $_GET['id'];
if($id == false){
echo '<title>网易云音乐</title></head><html><body>';
exit('<div class =\'error\'>错误 : ID未传入！</div>');


}
$json = json_decode(album_info($id),1);
//print_r($json);


echo<<<html
<title>{$json['album']['songs']['0']['album']['name']} - {$json['album']['songs']['0']['artists']['0']['name']}</title></head><html><body>
<div class ='menu shadow'>专辑: {$json['album']['songs']['0']['album']['name']} - {$json['album']['songs']['0']['artists']['0']['name']}</div><div class ='list'>
<img src = "{$json['album']['songs'][0]['album']['picUrl']}" alt = "{$json['album']['songs']['0']['album']['name']}"/><hr />

html;
$number =  count($json['album']['songs']);
$i = 0;
while($i < $number){
$s = round(($json['album']['songs'][$i]['duration']/1000),0);
$m = round(($s/60),0);
$s = $s % 60;
$time = $m.'分'.$s.'秒';
//$url = base64_encode($json['album']['songs'][$i]['mp3Url']);
$n = $i + 1;
echo <<<music
{$n}、{$json['album']['songs'][$i]['name']}
<br /><br><a href = "{$json['album']['songs'][$i]['mp3Url']}">在线播放</a><m>(时长:{$time} MP3)</m><br /><a href = "{$json['album']['songs'][$i]['mp3Url']}">下载音乐</a><m>(时长:{$time} MP3)</m>
<hr /><br>



music;

$i++;
}


echo <<<html

</div><br>
<div class = "menu font top"> Copyright © 2017 Powered By bruce Au </div>
<br>
</body>
</html>
html;
