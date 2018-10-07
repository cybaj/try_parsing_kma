<?


function connectDb($url, $id, $pw, $db, $port)	{

	$dbconn = mysqli_connect($url, $id, $pw, $db, $port) or die("error ". mysqli_error($dbconn));
	
	/*
	if($dbconn)	{

		echo $dbconn;

	}else{

		echo "db conn fails";

	}
	*/
	return $dbconn;
}

/*
function closeDb($dbconn)	{

	if($dbconn)	{

		mysqli_close($dbconn);

	}else{

		echo "db conn not exists.";

	}
	

}
*/
?>