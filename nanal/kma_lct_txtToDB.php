<?

include_once('varibles.php');
include_once('dbconnection.php');
//db 연결

include_once('txtData2Array_kmaToDB.php');
//LCT array  $lctArr[][][]

include_once('insert_kma_lct.php');

$dbconn = connectDb($url, $id, $pw, $db_0, $port_0);
mysqli_query ($dbconn,"set names utf8");

echo "<html>";

echo "<head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
echo "</head>";

//////////// nanal db 연결 확인 mysqli객체로.
print_r($dbconn);
echo "<br>";



//////////// array 생성
$result  =  txtToArray_kma();

echo $result[2][265][1];




////////// 일단 문제 없는걸로. 탵이 먹힌걸로. 간격은 안띄어져있어도.
for($i=265; $i<3793;$i++) {

	if(
		($result[2][$i][4]=="")
		||($result[2][$i][5]=="")
	){
		echo "파싱 문제";

	}


}

/*
	$insert_query = "SELECT * FROM kma_lct";
	$resultSet = mysqli_query($dbconn, $insert_query);
	$row = mysqli_fetch_row($resultSet);
	print_r($row);
*/


for($i=265; $i<3793;$i++) {


	$lct_n = $result[2][$i][0];
	$name = $result[2][$i][1];
	$lct_x = $result[2][$i][2];
	$lct_y = $result[2][$i][3];
	$lct_god = $result[2][$i][4];
	$guordo = $result[2][$i][5];


	insert_kma_lct($dbconn, $lct_n, $name, $lct_x, $lct_y, $lct_god, $guordo);

}



mysqli_close($dbconn);

?>