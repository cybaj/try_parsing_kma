<?

class kmaTableView {

	function tableView_Arr ($array1, $array2) {

		$number = count($array1);
		$resArray = array();

		for($i=0; $i<$number; $i++)  {

			$resArray[$i]['hour'] = $array2[$i]['hour'];
			$resArray[$i]['day'] = $array2[$i]['day'];
			$resArray[$i]['temp'] = $array2[$i]['temp'];
			$resArray[$i]['tmx'] = $array2[$i]['tmx'];
			$resArray[$i]['tmn'] = $array2[$i]['tmn'];
			$resArray[$i]['pty'] = $array2[$i]['pty'];
			$resArray[$i]['wfkor'] = $array2[$i]['wfkor'];
			$resArray[$i]['wfen'] = $array2[$i]['wfen'];
			$resArray[$i]['pop'] = $array2[$i]['pop'];
			$resArray[$i]['ws'] = $array2[$i]['ws'];
			$resArray[$i]['reh'] = $array2[$i]['reh'];

		}

		return $resArray;

	}

}



?>