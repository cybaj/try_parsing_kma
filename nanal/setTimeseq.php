<?
/*
얻어온 $kmaArr 배열을 이용한다.
$kmaArr[0~14,15,16,17][hour, day, ... reh]
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

		switch($wday) {

			case 02:
			$onSeqArray = array_slice($this->seqArray,1,15);
			$numSeqArray = count($onSeqArray);
			$onSeqArray = array_unshift($onSeqArray,$numSeqArray);
			return $onSeqArray;
			break;
			case 05:
			$onSeqArray = array_slice($this->seqArray,2,18);
			$numSeqArray = count($onSeqArray);
			return $onSeqArray;
			break;
			case 08:
			$onSeqArray = array_slice($this->seqArray,3,17);
			$numSeqArray = count($onSeqArray);
			return $onSeqArray;
			break;
			case 11:
			$onSeqArray = array_slice($this->seqArray,4,16);
			$numSeqArray = count($onSeqArray);
			return $onSeqArray;
			break;
			case 14:
			$onSeqArray = array_slice($this->seqArray,5,15);
			$numSeqArray = count($onSeqArray);
			return $onSeqArray;
			break;
			case 17:
			$onSeqArray = array_slice($this->seqArray,6,18);
			$numSeqArray = count($onSeqArray);
			return $onSeqArray;
			break;
			case 20:
			$onSeqArray = array_slice($this->seqArray,7,17);
			$numSeqArray = count($onSeqArray);
			return $onSeqArray;
			break;
			case 23:
			$onSeqArray = array_slice($this->seqArray,8,16);
			$numSeqArray = count($onSeqArray);
			return $onSeqArray;
			break;

		}

	}

	function setTimeseqn ($date) {

		return $this->getTimeseq($this->getWday ($date));

	}

}
?>