<?
/*
getKeyFromInputUX.php

날씨와 장소 ux
ux to lct_n, getdate 를 return 하는 함수

2015 05 16
ux 를 단순 text input 으로 가정.

*/


//html 로부터 get type 에 대해서 input 받고.
$inputTime = $_GET[ 'inputTime'];
$inputDong = $_GET['inputDong'];
$inputGu = $_GET['inputGu'];

//리턴 할 array 
$result = array();


//include
include_once('varibles.php');
include_once('dbconnection.php');

//db연결
$dbconn = connectDb($url, $id, $pw, $db_0, $port_0);
mysqli_query ($dbconn,"set names utf8");

//db 에서 lct_n 가져오기
//////////////////////////// 이것으로 부족. 동이름이 겹칠 수 있다. 수정 필요.
$query = "SELECT * FROM kma_lct WHERE name = '".$inputDong."'"." guordo = '".$inputGu."'";
$resultSet = mysqli_query ($dbconn, $query);

//array(6) { ["lct_n"]=> string(10) "1165054000" ["name"]=> string(9) "잠원동" ["lct_x"]=> string(2) "60" ["lct_y"]=> string(3) "126" ["lct_god"]=> string(5) "11650" ["guordo"]=> string(9) "서초구" }
$result = mysqli_fetch_assoc($resultSet);
//$result['lct_n']

//inputTime  을 구해야 하는데..


?>