<?
/*
 * 어떤 객관적 시간정보를 받아서 4시 반, 6시, 12시, 16시 반, 19시 반
 * 실행 되게 해야 함.
 */
include_once('kmaweather.php');
include_once('setTimeseq.php');
include_once('back_03_edit_array.php');




/*
보통 $kmaTable 형태 


Array ( [date] => 201508112000 
[0] => Array ( [hour] => 24 [day] => 0 [temp] => 25.2 [tmx] => -999.0 [tmn] => -999.0 [pty] => 0 [wfkor] => 구름 조금 [wfen] => Partly Cloudy [pop] => 0 [ws] => 2.2 [reh] => 83 ) 
[1] => Array ( [hour] => 3 [day] => 1 [temp] => 25.4 [tmx] => 26.0 [tmn] => 25.4 [pty] => 0 [wfkor] => 구름 조금 [wfen] => Partly Cloudy [pop] => 0 [ws] => 4.7 [reh] => 85 ) 
[2] => Array ( [hour] => 6 [day] => 1 [temp] => 25.6 [tmx] => 26.0 [tmn] => 25.4 [pty] => 0 [wfkor] => 구름 조금 [wfen] => Partly Cloudy [pop] => 0 [ws] => 4.7 [reh] => 80 ) [3] => Array ( [hour] => 9 [day] => 1 [temp] => 25.7 [tmx] => 26.0 [tmn] => 25.4 [pty] => 0 [wfkor] => 구름 조금 [wfen] => Partly Cloudy [pop] => 0 [ws] => 3.5 [reh] => 81 ) [4] => Array ( [hour] => 12 [day] => 1 [temp] => 25.6 [tmx] => 26.0 [tmn] => 25.4 [pty] => 0 [wfkor] => 구름 조금 [wfen] => Partly Cloudy [pop] => 0 [ws] => 2.9000000000000004 [reh] => 81 ) [5] => Array ( [hour] => 15 [day] => 1 [temp] => 25.8 [tmx] => 26.0 [tmn] => 25.4 [pty] => 0 [wfkor] => 구름 조금 [wfen] => Partly Cloudy [pop] => 0 [ws] => 1.5 [reh] => 77 ) [6] => Array ( [hour] => 18 [day] => 1 [temp] => 26.0 [tmx] => 26.0 [tmn] => 25.4 [pty] => 0 [wfkor] => 구름 조금 [wfen] => Partly Cloudy [pop] => 0 [ws] => 2.5 [reh] => 79 ) [7] => Array ( [hour] => 21 [day] => 1 [temp] => 26.0 [tmx] => 26.0 [tmn] => 25.4 [pty] => 0 [wfkor] => 구름 조금 [wfen] => Partly Cloudy [pop] => 0 [ws] => 5.2 [reh] => 85 ) [8] => Array ( [hour] => 24 [day] => 1 [temp] => 26.4 [tmx] => 26.0 [tmn] => 25.4 [pty] => 0 [wfkor] => 구름 조금 [wfen] => Partly Cloudy [pop] => 0 [ws] => 4.6000000000000005 [reh] => 75 ) [9] => Array ( [hour] => 3 [day] => 2 [temp] => 25.9 [tmx] => 25.7 [tmn] => 25.5 [pty] => 0 [wfkor] => 구름 조금 [wfen] => Partly Cloudy [pop] => 0 [ws] => 5.300000000000001 [reh] => 81 ) [10] => Array ( [hour] => 6 [day] => 2 [temp] => 25.7 [tmx] => 25.7 [tmn] => 25.5 [pty] => 0 [wfkor] => 구름 조금 [wfen] => Partly Cloudy [pop] => 0 [ws] => 5.4 [reh] => 73 ) [11] => Array ( [hour] => 9 [day] => 2 [temp] => 25.5 [tmx] => 25.7 [tmn] => 25.5 [pty] => 0 [wfkor] => 구름 조금 [wfen] => Partly Cloudy [pop] => 0 [ws] => 5.7 [reh] => 72 ) [12] => Array ( [hour] => 12 [day] => 2 [temp] => 25.3 [tmx] => 25.7 [tmn] => 25.5 [pty] => 0 [wfkor] => 구름 조금 [wfen] => Partly Cloudy [pop] => 0 [ws] => 5.0 [reh] => 71 ) [13] => Array ( [hour] => 15 [day] => 2 [temp] => 25.5 [tmx] => 25.7 [tmn] => 25.5 [pty] => 0 [wfkor] => 구름 조금 [wfen] => Partly Cloudy [pop] => 0 [ws] => 2.6 [reh] => 69 ) [14] => Array ( [hour] => 18 [day] => 2 [temp] => 25.7 [tmx] => 25.7 [tmn] => 25.5 [pty] => 0 [wfkor] => 구름 조금 [wfen] => Partly Cloudy [pop] => 0 [ws] => 1.7000000000000002 [reh] => 65 ) [15] => Array ( [hour] => 21 [day] => 2 [temp] => 25.8 [tmx] => 25.7 [tmn] => 25.5 [pty] => 0 [wfkor] => 구름 조금 [wfen] => Partly Cloudy [pop] => 0 [ws] => 4.4 [reh] => 69 ) [16] => Array ( [hour] => 24 [day] => 2 [temp] => 26.1 [tmx] => 25.7 [tmn] => 25.5 [pty] => 0 [wfkor] => 구름 조금 [wfen] => Partly Cloudy [pop] => 0 [ws] => 4.1000000000000005 [reh] => 71 ) )
..
[15], [16], [17], [18]
*/


$instance = new KmaWeather;
$kmaTable = $instance->area_weather_xml_parser(155, 155);

$cdate = $kmaTable["date"];






/*
*
결과로 출력되는 resultArray 는
아래와 같은 식이고

array(5) 
{ 
[0]=> string(2) "11" 
[1]=> array(4) { [0]=> string(2) "14" [1]=> string(2) "17" [2]=> string(2) "20" [3]=> string(2) "23" } 
[2]=> array(8) { [0]=> string(2) "02" [1]=> string(2) "05" [2]=> string(2) "08" [3]=> string(2) "11" [4]=> string(2) "14" [5]=> string(2) "17" [6]=> string(2) "20" [7]=> string(2) "23" } 
[3]=> array(4) { [0]=> string(2) "02" [1]=> string(2) "05" [2]=> string(2) "08" [3]=> string(2) "11" } 
[4]=> int(16) 
}

[0]은 getting 한 시간
[1]은 당일에 대해
[2]은 익일에 대해
[3]은 모레에 대해
[4]은 총 sequencing 시간 수 즉, 예보되는 시간의 수

*/


$instance_setTimeseq = new setTimeseq;
$resultArray = $instance_setTimeseq->setTimeseqn($cdate);





// 배열을 따기 위한 객체 생성
// 시간에 따른 sequence 배열 따오고, kma 데이터 배열 따와서
// 이 배열들을 가지고 처리 할 기능 클래스 구현
$edit = new edit_arr($resultArray, $kmaTable);

//var_dump($edit->getArray_today());

// echo "<br><br>";

// var_dump($edit->getArray_tmrw());

// echo "<br><br>";

// var_dump($edit->getArray_dat());





// today 정보를 edit 객체서 얻어서 넣고 
$edit->getArray_today();

$edit->getArray_tmrw();

$edit->getArray_dat();


//JS 연동을 위한 string 초기화
$script;



// today 에 대해서 각 element 생성 js 소스코드 문자열 만들기 
for($i = 0; $i < $edit->len_today; $i++)
{
	global $script;
	$script .= "//div 객체 생성
  var div = document.createElement(\"div\");
  div.innerHTML='"."hour : ".$edit->arr_today[$i]['hour']."  day : ".$edit->arr_today[$i]['day']."  temp : ".$edit->arr_today[$i]['temp']."  tmx : ".$edit->arr_today[$i]['tmx']."  tmn : ".$edit->arr_today[$i]['tmn']."  pty : ".$edit->arr_today[$i]['pty']."  wfkor : ".$edit->arr_today[$i]['wfkor']."  wfen : ".$edit->arr_today[$i]['wfen']."  pop : ".$edit->arr_today[$i]['pop']."  ws : ".$edit->arr_today[$i]['ws']."  reh : ".$edit->arr_today[$i]['reh']."';
  //css설정
  div.style.border= \"1px solid black\";
  div.style.margin= \"5px\";
  div.style.backgroundColor= \"lightgreen\";
  div.style.float= \"left\";
  div.onclick= function () { //익명 메서드
          //event.srcElement => 이벤트 발생 객체
          event.srcElement.style.backgroundColor= \"yellow\";
          event.srcElement.style.border= \"1px dotted red\";
          //event.srcElement.style.float = \"left\";
  };
  //** 바디의 마지막 자식으로 div 객체 추가
  document.body.appendChild(div);";
}

// tmrw 에 대해서 각 element 생성 js 소스코드 문자열 만들기 
for($i = $edit->len_today; $i < $edit->len_today+$edit->len_tmrw; $i++)
{
	global $script;
	$script .= "//div 객체 생성
  var div = document.createElement(\"div\");
  div.innerHTML='"."hour : ".$edit->arr_tmrw[$i]['hour']."  day : ".$edit->arr_tmrw[$i]['day']."  temp : ".$edit->arr_tmrw[$i]['temp']."';
  //css설정
  div.style.border= \"1px solid black\";
  div.style.margin= \"5px\";
  div.style.backgroundColor= \"lightgreen\";
  div.style.float= \"left\";
  div.onclick= function () { //익명 메서드
          //event.srcElement => 이벤트 발생 객체
          event.srcElement.style.backgroundColor= \"yellow\";
          event.srcElement.style.border= \"1px dotted red\";
          //event.srcElement.style.float = \"left\";
  };
  //** 바디의 마지막 자식으로 div 객체 추가
  document.body.appendChild(div);";
}

// dat 에 대해서 각 element 생성 js 소스코드 문자열 만들기 
for($i = $edit->len_today + $edit->len_tmrw; $i < $edit->len_today + $edit->len_tmrw + $edit->len_dat; $i++)
{
	global $script;
	$script .= "//div 객체 생성
  var div = document.createElement(\"div\");
  div.innerHTML='"."hour : ".$edit->arr_dat[$i]['hour']."  day : ".$edit->arr_dat[$i]['day']."  temp : ".$edit->arr_dat[$i]['temp']."';
  //css설정
  div.style.border= \"1px solid black\";
  div.style.margin= \"5px\";
  div.style.backgroundColor= \"lightgreen\";
  div.style.float= \"left\";
  div.onclick= function () { //익명 메서드
          //event.srcElement => 이벤트 발생 객체
          event.srcElement.style.backgroundColor= \"yellow\";
          event.srcElement.style.border= \"1px dotted red\";
          //event.srcElement.style.float = \"left\";
  };
  //** 바디의 마지막 자식으로 div 객체 추가
  document.body.appendChild(div);";
}




// 브라우저에서 한글이 잘 나올 수 있게 html 태그
$openHeadTag ="<html><head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";

$testScript = "<script type=\"text/javascript\">
	               function Init() {";
	                       
	               
	        

$closeHeadTag = "}</script></head>";

$bodyTag = "<body onload=\"Init();\"></body>";

echo $openHeadTag.$testScript.$script.$closeHeadTag.$bodyTag;






//echo "<br>".$kmaTable['date']."<br>";


// var_dump($kmaTable);


// var_dump($resultArray);

// echo "<br><br><br><br>";

// var_dump($instance->area_weather_xml_parser(125,125));






?>