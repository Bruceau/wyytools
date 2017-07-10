<?php
    
function curl_get($url)
{   
    
    $refer = "http://music.163.com";
   $header= array('Cookie:'.'MUSIC_U=8018d4167eb8620e4104eabe91ff3f8c5df2dd59eabfec89c1d66fefe3c18c5464cea43057c2871e25f9442f937457d56c2e36361855611dc3061cd18d77b7a0;usertrack=ezq0alWT9bxPqBsxJz3DAg==;__csrf=5ccc54862fd1ef2bc9d908cb4deccad8;deviceId=QTAwMDAwNDBFQTI1REYJNTA6RjU6MjA6NzE6REM6M0YJMzc5MDYyMGVlZDljYjk4CWJmMzU1MDEz;appver=2.9.1;os=android;osver=4.1.2;mobilename=SCH-I759;resolution=800x480;channel=netease;
');
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
    curl_setopt($ch, CURLOPT_REFERER, $refer);
    $con = curl_exec($ch);
    curl_close($ch);
    return $con;
}
function getdata($w,$page)
{   
$word = urlencode($w);
$num = ($page-1)*20;
	$ch=curl_init('http://s.music.163.com/search/get/?src=lofter&type=1&filterDj=true&s='.$word.'&limit=20&offset='.$num.'&callback=');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; U; Android 4.0.4; es-mx; HTC_One_X Build/IMM76D) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0');
    $ret = curl_exec($ch);
    curl_close($ch);
    return $ret;
}


//搜索列表  type类型
/*
歌曲 1
专辑 10
歌手 100
歌单 1000
用户 1002
mv 1004
歌词 1006
主播电台 1009
*/
function search($word,$page,$type){
    $refer = "http://music.163.com";
$num = ($page-1)*20;
//var_dump($num);
//$num = 20;
//echo $num;
$word = urlencode($word);
$url = "http://music.163.com/api/search/pc";
$data = "s={$word}&offset ={$num}&limit=20&type={$type}";
$ch = curl_init ();
curl_setopt( $ch, CURLOPT_URL, $url );
curl_setopt ( $ch, CURLOPT_HEADER, 0 );
curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
curl_setopt($ch, CURLOPT_REFERER,$refer);
$return = curl_exec ( $ch );
curl_close ( $ch );
return $return;
}
//MV 信息
function mv_info($id)
{
    $url = "http://music.163.com/api/mv/detail?id=".$id."&type=mp4";
    return curl_get($url);
}

//歌词信息
function lyric($id)
{
    $url = "http://music.163.com/api/song/lyric?os=pc&id=".$id."&lv=-1&kv=-1&tv=-1";
    return curl_get($url);
}
//音乐信息
function music_info($id)
{
    $url = "http://music.163.com/api/song/detail/?id=".$id."&ids=%5B".$id."%5D&csrf_token=";
    return curl_get($url);
}
function artist_album($id, $limit)
{
    $url = "http://music.163.com/api/artist/albums/" . $id . "?limit=" . $limit;
    return curl_get($url);
}
//专辑信息
function album_info($id)
{
    $url = "http://music.163.com/api/album/" . $id;
    return curl_get($url);
}
 //歌单
function playlist($id)
{
    $url = "http://music.163.com/api/playlist/detail?id=" . $id;
    return curl_get($url);
}

