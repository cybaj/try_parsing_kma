<?
//Comparer.php

$input = $_GET['inputLCT'];



include_once("txtData2Array_01.php");
include_once("kmaweather.php");
include_once("setTimeseq.php");
include_once("kmaTableView.php");


//to get Array of LCT 
for($i=265; $i<3793;$i++) {

	if($lctArr[2][$i][1]==$input) {

		$inputLCT_x = $lctArr[2][$i][3];
		$inputLCT_y = $lctArr[2][$i][4];

	}
	
}

echo "<html>";

echo "<head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
echo "</head>";

echo $inputLCT_x."<br>";
echo $inputLCT_y."<br>";
echo $input."<br>";

$kmaObj = new KmaWeather;

$kmaArr = $kmaObj->area_weather_xml_parser($inputLCT_x,$inputLCT_y);
//해당 로케이션의 open xml 데이터 
print_r($kmaArr);

//setTimeseq 테스트


$testSeq = new setTimeseq;

//클래스 함수에 적용할 값을 정의하고.
$date = $kmaArr['date'];

$wday = $testSeq->getWday($date);

$seq = $testSeq->getTimeseq($wday);


echo "<br>";
print_r($seq);



//테이블 만드는 부분.
$table = new kmaTableView;

$result = $table->tableView_arr($seq,$kmaArr);

echo "<br>";
print_r($result);


echo "</html>";

/*
[0][j][k] 시도 넘버
[1][j][k] 군구 넘버
[2][16~264][k] 동 넘버    
[2][265~3792]   
[0] lctNo
[1]	동이름
[2] 구 lctNo
[3] lct_x
[4] lct_y
*/


?>