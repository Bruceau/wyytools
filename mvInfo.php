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
exit('<div class =\'error\'>错误:ID未传入！</div>');


}
$json = json_decode(mv_info($id),1);
//print_r($json);

$s = round(($json['data']['duration']/1000),0);
$m = round(($s/60),0);
$s = $s % 60;
$time = $m.'分'.$s.'秒';
echo<<<html
<title>{$json['data']['name']} - {$json['data']['artistName']}</title></head><html><body>
<div class ='menu shadow'>MV: {$json['data']['name']} - {$json['data']['artistName']}</div><div class ='list'>
<img src= "{$json['data']['cover']}" alt = "{$json['data']['name']}"><br><br>
<!--<font color = "green">注意：mv地址需要复制到浏览器手动访问</font><br><br>-->
html;


if($json['data']['brs']['1080']){
$url = base64_encode($json['data']['brs']['1080']);
echo <<<html
<a href ="{$json['data']['brs']['1080']}" rel = "noreferrer">1080P</a><br><br>


html;



}
if($json['data']['brs']['720']){

$url = base64_encode($json['data']['brs']['720']);
echo <<<html
<a href ="{$json['data']['brs']['720']}" rel = "noreferrer">720P</a>
<br><br>

html;

}
if($json['data']['brs']['480']){

$url = base64_encode($json['data']['brs']['480']);
echo <<<html
<a href ="{$json['data']['brs']['480']}" rel = "noreferrer">480P</a>
<br><br>

html;

}
if($json['data']['brs']['240']){

$url = base64_encode($json['data']['brs']['240']);
echo <<<html
<a href ="{$json['data']['brs']['240']}" rel = "noreferrer">240P</a>


html;

}

echo <<<html

</div><br>
<div class = "menu font top"> Copyright © 2017 Powered By Bruce Au </div>
<br>
</body>
</html>
html;
