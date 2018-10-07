<?

function insert_kma_lct($conn, $lct_n, $name, $lct_x, $lct_y, $lct_god, $guordo)	{
	//echo $lct_n."\t".$name."\t".$lct_x."\t".$lct_y."\t".$lct_god."\t".$guordo."<br>";
	$insert_query = "INSERT INTO kma_lct(lct_n, name, lct_x, lct_y, lct_god, guordo) VALUES(".$lct_n.", '".$name."', ".$lct_x.", ".$lct_y.", ".$lct_god.", '".$guordo."')";
	mysqli_query($conn, $insert_query);

}

?>