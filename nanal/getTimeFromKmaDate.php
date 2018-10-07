<?
class getTimeFromKmaDate	{

	var $timeArr = array();

	function getTimeToArr($date) {
			//201505160500
		$timeArr['day'] = substr($date, 6, 2);// (substr : 0번째,.. 8번째 글자부터 뒤에서 2 글자 제외하고.)  받아온 예보 측정 시각
		$timeArr['month'] = substr($date, 4, 2);
		$timeArr['year'] = substr($date, 0, 4);
		$timeArr['hour'] = substr($date, -4, 2);

		switch($this->timeArr['hour']) {

			case 02:
			$timeArr['dayseq'] = 0;
			break;
 
 			case 05:
			$timeArr['dayseq'] = 1;
			break;

			case 08:
			$timeArr['dayseq'] = 2;
			break;

			case 11:
			$timeArr['dayseq'] = 3;
			break;

			case 14:
			$timeArr['dayseq'] = 4;
			break;

			case 17:
			$timeArr['dayseq'] = 5;
			break;

			case 20:
			$timeArr['dayseq'] = 6;
			break;

			case 23:
			$timeArr['dayseq'] = 7;
			break;

		}

	return $timeArr;

	}

}

?>