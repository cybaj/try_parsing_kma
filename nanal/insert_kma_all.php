<?

function insert_kma_all($conn, $lct_n, $date, $result)	{
	
	for($i=0;$i<16;$i++)	{

		$hour = $result[$i]['hour'];
		$day = $result[$i]['day'];
		$temp = $result[$i]['temp'];
		$tmx = $result[$i]['tmx'];
		$tmn = $result[$i]['tmn'];
		$pty = $result[$i]['pty'];
		$wfkor = $result[$i]['wfkor'];
		$wfen = $result[$i]['wfen'];
		$pop = $result[$i]['pop'];
		$ws = $result[$i]['ws'];
		$reh = $result[$i]['reh'];

		$insert_query = "INSERT INTO kma_all(lct_n, getdate, seqno, day, hour, temp, tmx, tmn, pty, wfkor, wfen, pop, ws, reh) VALUES(".$lct_n.", ".$date.", ".$i.", ".$day.", ".$hour.", ".$temp.", ".$tmx.", ".$tmn.", ".$pty.", '".$wfkor."', '".$wfen."', ".$pop.", ".$ws.", ".$reh.")";
		mysqli_query($conn, $insert_query);
	}
}

?>