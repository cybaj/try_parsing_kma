<?



function db_kma_lctToArr($dbconn)	{

	$select_query = "SELECT * from kma_lct";
	$lctArr = mysqli_query($dbconn, $select_query);
	$result = array();
	$i=0;

	while($row = mysqli_fetch_row($lctArr)){
		$result[$i] = $row;
		$i++;
	}
	

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


	return $result;
}



?>