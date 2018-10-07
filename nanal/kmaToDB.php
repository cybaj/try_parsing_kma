<?

//include
include_once("kmaweather.php");

include_once('varibles.php');
include_once('dbconnection.php');
include_once('db_kma_lctToArr.php');

include_once("setTimeseq.php");
include_once("kmaTableView.php");

include_once('insert_kma_all.php');


//db 연결
$dbconn = connectDb($url, $id, $pw, $db_0, $port_0);
mysqli_query ($dbconn,"set names utf8");



//html 페이지에서 한글처리
echo "<html>";

echo "<head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
echo "</head>";


//KmaWeather 인스턴스 생성
$kmaObj = new KmaWeather;

//setTimeseq 인스턴스 생성 : seq 을 생성하는 함수를 위한 인스턴스
$getSeq = new setTimeseq;

//kmaTableView 인스턴스 생성 : seq에 맞게 받아온 kma 데이터 배열로 최종처리.
$table = new kmaTableView;

//kma_lct 테이블 데이터를 배열로 가져옴.
	/*[0][j][k] 시도 넘버

	[j] j 가 각 동에 따른 kma 데이터

	[k]
	[0] lctNo
	[1]	동이름
	[2] lct_x
	[3] lct_y
	[4] 구 lctNo
	[5] 구

	*/

//db kma_lct 테이블을 $lctArray 배열로 받아와서. $lctArray[0~3527][..] rows로 받아옴. 즉 index 숫자.
$lctArray  =  db_kma_lctToArr($dbconn);


//여기서 i는 각 동
for($i=0; $i<3527; $i++)	{

//kma_lct 로부터 n, x, y 데이터 받아와서.
	$lct_n = $lctArray[$i][0];
	$lct_x = $lctArray[$i][2];
	$lct_y = $lctArray[$i][3];

//lct 에 따른 kma 데이터 받아옴.
	$kmaArr = $kmaObj->area_weather_xml_parser($lct_x,$lct_y);

//sequence에 맞춰서 db에 넣을 데이터를 고를 때, seq 구하기
	$date = $kmaArr['date'];

	$wday = $getSeq->getWday($date);
	$seq = $getSeq->getTimeseq($wday);


//한 lct row 에 대해서, 즉 한 동에 대해서 새벽 2시에 받아온 kma 데이터를 seq 고려해 최종으로 뽑은 array
	$result = $table->tableView_arr($seq,$kmaArr);
/*
result(16) [0~15]=> array(11) 
{ ["hour"]=> string(2) "12" ["day"]=> string(1) "2" 
["temp"]=> string(4) "22.0" ["tmx"]=> string(6) "-999.0" 
["tmn"]=> string(4) "13.0" ["pty"]=> string(1) "0" 
["wfkor"]=> string(6) "맑음" ["wfen"]=> string(5) "Clear" 
["pop"]=> string(1) "0" ["ws"]=> string(3) "3.0" 
["reh"]=> string(2) "30" } 
*/

//db kma_all 에 입력
	insert_kma_all($dbconn, $lct_n, $date, $result);

}

?>