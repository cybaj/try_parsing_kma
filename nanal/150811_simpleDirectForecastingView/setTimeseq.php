<?
/*
얻어온 $kmaArr 배열을 이용한다.
$kmaArr[0~14,15,16,17][hour, day, ... reh]
*/


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


/*
$date
*/
class setTimeseq {
	
	//시간에 따른 seq 정한다.
	//$date = $kmaArr['date']; // 201504281400 이런 형태. 여기서 14만 필요하다.


	/*
	배열 초기화 부분.
	'02','05','08','11','14','17','20','23' 을 세번씩. count($seqArray)는 23
	seqArray[15] 는 '23'이다.
	getTimeseq()
	이 배열의 부분 구간을 떼어서 파싱하려고 한다.
	*/

	var $seqArray = array('02','05','08','11','14','17','20','23','02','05','08','11','14','17','20','23','02','05','08','11','14','17','20','23','02');
	

	function getWday($date) {
		$wday = substr($date,8,-2);// (substr : 0번째,.. 8번째 글자부터 뒤에서 2 글자 제외하고.)  받아온 예보 측정 시각
		return $wday;
	}


	/*스위치문을 쓰자. 관련 변수 $seqArray
	$onSeqArray 의 0번째 값은 seq 넘버*/
	function getTimeseq ($wday) {

		$resultArray = array();
		
		//echo gettype($wday);
		

		switch($wday) {

			case '02':
			$onSeqArray = array_slice($this->seqArray,1,15);
			$todayArray = array_slice($onSeqArray,0,7);
			$tmmrrwArray = array_slice($onSeqArray,7,8);
			$datArray = ""; //모레 예보가 없음.

			$numSeqArray = count($onSeqArray);
			$resultArray[0] = $wday;
			$resultArray[1] = $todayArray;
			$resultArray[2] = $tmmrrwArray;
			$resultArray[3] = $datArray;
			$resultArray[4] = $numSeqArray;

			// array_unshift($resultArray,$datArray);
			// array_unshift($resultArray,$tmmrrwArray);
			// array_unshift($resultArray,$todayArray);
			// array_unshift($resultArray,$numSeqArray);
			return $resultArray;
			break;
			case '05':
			$onSeqArray = array_slice($this->seqArray,2,18);
			$todayArray = array_slice($onSeqArray,0,6);
			$tmmrrwArray = array_slice($onSeqArray,6,8);
			$datArray = array_slice($onSeqArray,14,4);

			$numSeqArray = count($onSeqArray);
			$resultArray[0] = $wday;
			$resultArray[1] = $todayArray;
			$resultArray[2] = $tmmrrwArray;
			$resultArray[3] = $datArray;
			$resultArray[4] = $numSeqArray;

			// array_unshift($resultArray,$datArray);
			// array_unshift($resultArray,$tmmrrwArray);
			// array_unshift($resultArray,$todayArray);
			// array_unshift($resultArray,$numSeqArray);
			return $resultArray;
			break;
			case '08':
			$onSeqArray = array_slice($this->seqArray,3,17);
			$todayArray = array_slice($onSeqArray,0,5);
			$tmmrrwArray = array_slice($onSeqArray,5,8);
			$datArray = array_slice($onSeqArray,13,4);

			$numSeqArray = count($onSeqArray);
			$resultArray[0] = $wday;
			$resultArray[1] = $todayArray;
			$resultArray[2] = $tmmrrwArray;
			$resultArray[3] = $datArray;
			$resultArray[4] = $numSeqArray;

			// array_unshift($resultArray,$datArray);
			// array_unshift($resultArray,$tmmrrwArray);
			// array_unshift($resultArray,$todayArray);
			// array_unshift($resultArray,$numSeqArray);
			return $resultArray;
			break;
			case '11':
			$onSeqArray = array_slice($this->seqArray,4,16);
			$todayArray = array_slice($onSeqArray,0,4);
			$tmmrrwArray = array_slice($onSeqArray,4,8);
			$datArray = array_slice($onSeqArray,12,4);

			$numSeqArray = count($onSeqArray);
			$resultArray[0] = $wday;
			$resultArray[1] = $todayArray;
			$resultArray[2] = $tmmrrwArray;
			$resultArray[3] = $datArray;
			$resultArray[4] = $numSeqArray;

			// array_unshift($resultArray,$datArray);
			// array_unshift($resultArray,$tmmrrwArray);
			// array_unshift($resultArray,$todayArray);
			// array_unshift($resultArray,$numSeqArray);
			return $resultArray;
			break;
			case '14':
			$onSeqArray = array_slice($this->seqArray,5,15);
			$todayArray = array_slice($onSeqArray,0,3);
			$tmmrrwArray = array_slice($onSeqArray,3,8);
			$datArray = array_slice($onSeqArray, 11,4);

			$numSeqArray = count($onSeqArray);
			$resultArray[0] = $wday;
			$resultArray[1] = $todayArray;
			$resultArray[2] = $tmmrrwArray;
			$resultArray[3] = $datArray;
			$resultArray[4] = $numSeqArray;

			// $numSeqArray = count($onSeqArray);
			// array_unshift($resultArray,$datArray);
			// array_unshift($resultArray,$tmmrrwArray);
			// array_unshift($resultArray,$todayArray);
			// array_unshift($resultArray,$numSeqArray);
			return $resultArray;
			break;
			case '17':
			$onSeqArray = array_slice($this->seqArray,6,18);
			$todayArray = array_slice($onSeqArray,0,2);
			$tmmrrwArray = array_slice($onSeqArray,2,8);
			$datArray = array_slice($onSeqArray,10,8);

			$numSeqArray = count($onSeqArray);
			$resultArray[0] = $wday;
			$resultArray[1] = $todayArray;
			$resultArray[2] = $tmmrrwArray;
			$resultArray[3] = $datArray;
			$resultArray[4] = $numSeqArray;

			// $numSeqArray = count($onSeqArray);
			// array_unshift($resultArray,$datArray);
			// array_unshift($resultArray,$tmmrrwArray);
			// array_unshift($resultArray,$todayArray);
			// array_unshift($resultArray,$numSeqArray);
			return $resultArray;
			break;
			case '20':
			$onSeqArray = array_slice($this->seqArray,7,17);
			$todayArray = array_slice($onSeqArray,0,1);
			$tmmrrwArray = array_slice($onSeqArray,1,8);
			$datArray = array_slice($onSeqArray,9,8);

			$numSeqArray = count($onSeqArray);
			$resultArray[0] = $wday;
			$resultArray[1] = $todayArray;
			$resultArray[2] = $tmmrrwArray;
			$resultArray[3] = $datArray;
			$resultArray[4] = $numSeqArray;

			// $numSeqArray = count($onSeqArray);
			// array_unshift($resultArray,$datArray);
			// array_unshift($resultArray,$tmmrrwArray);
			// array_unshift($resultArray,$todayArray);
			// array_unshift($resultArray,$numSeqArray);
			return $resultArray;
			break;
			case '23':
			$onSeqArray = array_slice($this->seqArray,8,16);
			$todayArray = "";
			$tmmrrwArray = array_slice($onSeqArray,0,8);
			$datArray = array_slice($onSeqArray,8,8);

			$numSeqArray = count($onSeqArray);
			$resultArray[0] = $wday;
			$resultArray[1] = $todayArray;
			$resultArray[2] = $tmmrrwArray;
			$resultArray[3] = $datArray;
			$resultArray[4] = $numSeqArray;

			// $numSeqArray = count($onSeqArray);
			// array_unshift($resultArray,$datArray);
			// array_unshift($resultArray,$tmmrrwArray);
			// array_unshift($resultArray,$todayArray);
			// array_unshift($resultArray,$numSeqArray);
			return $resultArray;
			break;

		}

	}

	function setTimeseqn ($date) {

		return $this->getTimeseq($this->getWday ($date));
		//return $this->getTimeseq(08);

	}

}
?>