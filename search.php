<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
   <link rel="stylesheet" href="css.css" type="text/css" />
<meta name="viewport" content="width=device-width, content="width=device-width,initial-scale=1" /><title>网易云音乐</title></head><html><body>
<?php
include('curl.class.php');
$page = $_GET['page']?$_GET['page']:1;
if($_GET['keywords'] == false){

exit('<div class =\'error\'>错误:请输入关键词！</div>');


}
//$json = search($_GET['keywords'],$page,1);
$json = getdata($_GET['keywords'],$page);
$search = json_decode($json);
//print_r($search);
$number = $search->result->songCount;//歌曲总数
$songCount =  count($search->result->songs);//查询到的歌曲数
if($songCount == 0 | $songCount == false){
exit('<div class = \'error\'>错误:暂无你需要的音乐</div>');

}
$i=0;
echo '<div class =\'menu shadow\'>'.$_GET['keywords'].'  -  查询结果</div>';
while($i<$songCount){
$n = $i+1;
$singer =  $search->result->songs[$i]->artists['0']->name;
if($singer == false){
echo <<<m
<div class ='search'>
<font color="#ff9966">{$n}</font>、<a href="info.php?id={$search->result->songs[$i]->id}">{$search->result->songs[$i]->name}</a></div>





m;
}else{


echo <<<m
<div class ='search'>
<font color="#ff9966">{$n}</font>、<a href="info.php?id={$search->result->songs[$i]->id}">{$search->result->songs[$i]->name} - {$singer}</a></div>
m;

}

$i++;

}
$pages = ceil($number/20);
$pageUp = $page - 1;
$pageDown = $page + 1;
if($page == 1 && $pages != 1){
echo <<<html

<div class = 'menu font top'><a href ='#'>上一页</a> - <a href = '?page={$pageDown}&keywords={$_GET['keywords']}'>下一页</a> (第 {$page}/{$pages} 页) 共{$number} 条</div>
html;
}elseif($page == $pages){
echo <<<html

<div class = 'menu font top'><a href ='?page={$pageUp}&keywords={$_GET['keywords']}'>上一页</a> - <a href = '#'>下一页</a>(第 {$page}/{$pages} 页) 共{$number} 条</div>
html;
}else{
echo <<<html

<div class = 'menu font top'><a href ='?page={$pageUp}&keywords={$_GET['keywords']}'>上一页</a> - <a href ='?page={$pageDown}&keywords={$_GET['keywords']}'>下一页</a> (第 {$page}/{$pages} 页) 共{$number} 条</div>
html;
}

echo '</body></html>';
