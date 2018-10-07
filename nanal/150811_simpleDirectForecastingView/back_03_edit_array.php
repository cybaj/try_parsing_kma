<?
/*
 *받은 array 처리하는 부분
 */

class edit_arr 
{
	var $date;
	var $time_publish; // 공포한 시간 
	var $casting_num; // 예보 해주는 시간의 수
	var $casting_mem; // 예보 해주는 기상 데이터의 종류

	//멤버 배열
	var $arr_rslt;
	var $arr_kma;

	// 오늘, 내일, 모레의 시퀀스 넘버 
	var $len_today;
	var $len_tmrw;
	var $len_dat;

	// 결과 배열
	var $arr_today;
	var $arr_tmrw;
	var $arr_dat;

	// 오늘자 sequence 의 길이를 따져서 time_publish를 정함
	public Function edit_arr ($resultArray, $kmaTable)
	{

		// 객체 멤버 배열에 할당
		$this->arr_rslt = $resultArray;
		$this->arr_kma = $kmaTable;

		// 공포 시간과 예보 시간의 수를 을 resultArray에서 전달 받음, 기상 데이터 종류 개수를 kma에서 받음 
		$this->date = $this->arr_kma['date'];
		$this->time_publish = split($this->date, 8, -2);
		$this->time_publish = $this->arr_rslt[0];
		$this->casting_num = $this->arr_rslt[4];
		$this->casting_mem = count($this->arr_kma[0]);

		// 각 시퀀스 수 count로 세서 넣기
		$this->len_today = count($this->arr_rslt[1]);
		$this->len_tmrw = count($this->arr_rslt[2]);
		$this->len_dat = count($this->arr_rslt[3]);


	}


	public Function getArray_today() 
	{

		$this->arr_rslt;
		$length = $this->len_today;

		for($i=0; $i<$length; $i++)
		{
			$this->arr_today[$i] = $this->arr_kma[$i];
		}

		return $this->arr_today;

	}

	public Function getArray_tmrw()
	{

		$this->arr_rslt;
		$length = $this->len_today;
		$length += $this->len_tmrw;

		for($i=$this->len_today; $i<$length; $i++)
		{
			$this->arr_tmrw[$i] = $this->arr_kma[$i];
		}

		return $this->arr_tmrw;

	}

	public Function getArray_dat()
	{


		$this->arr_rslt;
		$length = $this->len_today;
		$length += $this->len_tmrw;
		$length += $this->len_dat;

		for($i=$this->len_today+$this->len_tmrw; $i<$length; $i++)
		{
			$this->arr_dat[$i] = $this->arr_kma[$i];
		}

		return $this->arr_dat;

	}

}


/*
 * 오늘, 내일, 모레로 나누었음
 */



?>