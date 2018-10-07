<?
/*
이 php 프로그램은 
seqtime 마다 불러져서 실행 될 것이다.

kmaWeather 함수로 
각 동네에 대해서 kmaWeather 불러서 seq=0 데이터만
kma_his 테이블에 입력할 것이다.

선언부
동네별 kmaWeather부
db 입력부

*/

//include
include_once("kmaweather.php");

include_once('varibles.php');
include_once('dbconnection.php');
include_once('db_kma_lctToArr.php');

include_once('insert_kma_his.php');
include_once('getTimeFromKmaDate.php');


//db connection
$dbconn = connectDb($url, $id, $pw, $db_0, $port_0);
mysqli_query ($dbconn,"set names utf8");


//KmaWeather 인스턴스 생성
$kmaObj = new KmaWeather;

//kmaDate 인스턴스 생성 
$kmaDate = new getTimeFromKmaDate;

//db kma_lct 테이블을 $lctArray 배열로 받아와서. $lctArray[0~3527][..] rows로 받아옴. 즉 index 숫자.
$lctArray  =  db_kma_lctToArr($dbconn);




///////////// 동네별 kmaWeather부

//여기서 i는 각 동
for($i=0; $i<3528; $i++)	{

	$lct_n = $lctArray[$i][0];
	$lct_x = $lctArray[$i][2];
	$lct_y = $lctArray[$i][3];

	//lct 에 따른 kma 데이터 받아옴.
	$kmaArr = $kmaObj->area_weather_xml_parser($lct_x,$lct_y);

	//date 문자열을 파싱하고 hour 에 따른 dayseq 을 추가해서 timeArr 받아옴
	$date = $kmaArr['date'];
	$timeArr = $kmaDate->getTimeToArr($date);

	//$lct_n 과 $date 와  $kmaArr 와 $timeArr 으로  kmaDate 에 데이터 넣기
	insert_kma_his($dbconn, $lct_n, $date, $timeArr, $kmaArr);

}

?>