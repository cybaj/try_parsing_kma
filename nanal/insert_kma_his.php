<?

function insert_kma_his($conn, $lct_n, $date, $timeArr, $result)	{
	
	$day = $timeArr['day'];
	$month = $timeArr['month'];
	$year = $timeArr['year'];
	$hour = $timeArr['hour'];
	$dayseq = $timeArr['dayseq'];

	$temp = $result[0]['temp'];
	$tmx = $result[0]['tmx'];
	$tmn = $result[0]['tmn'];
	$pty = $result[0]['pty'];
	$wfkor = $result[0]['wfkor'];
	$wfen = $result[0]['wfen'];
	$pop = $result[0]['pop'];
	$ws = $result[0]['ws'];
	$reh = $result[0]['reh'];

	$insert_query = "INSERT INTO kma_his(lct_n, getdate, day, month, year, hour, dayseq, temp, tmx, tmn, pty, wfkor, wfen, pop, ws, reh) VALUES(".$lct_n.", ".$date.", ".$day.", ".$month.", ".$year.", ".$hour.", ".$dayseq.", ".$temp.", ".$tmx.", ".$tmn.", ".$pty.", '".$wfkor."', '".$wfen."', ".$pop.", ".$ws.", ".$reh.")";
	mysqli_query($conn, $insert_query);

}

?>