<?
$fp = fopen($_SERVER['DOCUMENT_ROOT']."/nanal/OutFile.txt", "r");
if(!feof($fp)){
	$i=0; $j=0;
	while($buffer=fgets($fp,4096)){

		$buffer = str_replace("\n","",$buffer);
		$buffer = str_replace("\r","",$buffer);
		list($lct_n, $name, $lct_x, $lct_y, $offname) = split("\t", $buffer);
		if(($lct_n>100)&($i==0)){
			$i=1;
		}
		if(($lct_n>100000)&($i==1)){
			$i=2;
		}
		$lctArr[$i][$j][0] = $lct_n;
		$lctArr[$i][$j][1] = $name;
		$lctArr[$i][$j][2] = $offname;
		$lctArr[$i][$j][3] = $lct_x;
		$lctArr[$i][$j][4] = $lct_y;

		$j++;

/*[0][j][k] 시도 넘버

[1][j][k] 군구 넘버
[2][16~264][k] 동 넘버    
[2][265~3792]   
[0] lctNo
[1]	동이름
[2] 구 lctNo
[3] lct_x
[4] lct_y


*/
	}	
}

?>