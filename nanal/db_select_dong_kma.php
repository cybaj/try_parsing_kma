<?
/*

어떤 동이름 문자열이 input 으로 들어갔을 때.
이 함수는 kma_lct, kma_all join 하는.

*/


//db를 불러와야 하고.
include_once('varibles.php');
include_once('dbconnection.php');

//db 커넥션 만들기
$dbconn = connectDb($url, $id, $pw, $db_0, $port_0);
mysqli_query ($dbconn,"set names utf8");


//입력된 동의 모든 kma 데이터.  kma_lct 해당 동과 kma_all 이 inner join
function select_dong_kma($dong) 
{
	$query_select_lct_all = "SELECT * FROM (SELECT * FROM kma_lct as a WHERE a.name = '".$dong.") as b INNER JOIN kma_all as c WHERE b.lct_n = c.lct_n";
	$resultSet = mysqli_query ($dbconn, $query_select_lct_all);
	$num = mysqli_num_rows($result);
	$result = array();
	
	for($i=0;$i<$num;$i++)	{
		$result[$i] = mysqli_fetch_assoc($resultSet);
	}

	return $result;

	//result[줄 수..][lct_n, name, gu, ... , getdate, kma데이타]
}

?>