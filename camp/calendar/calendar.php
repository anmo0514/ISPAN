<?php 
class Calendar {
	function threshold($year, $month) {
		$firstDay = mktime(0, 0, 0, $month, 1, $year);
		$lastDay = strtotime('+1 month -1 day', $firstDay);
		//取得天數  
		$days = date("t", $firstDay);
		//取得第一天是星期幾
		$firstDayOfWeek = date("N", $firstDay);
		//獲得最後一天是星期幾
		$lastDayOfWeek = date('N', $lastDay);
		
		//上一個月最後一天
		$lastMonthDate = strtotime('-1 day', $firstDay);
		$lastMonthOfLastDay = date('d', $lastMonthDate);
		//下一個月第一天
		$nextMonthDate = strtotime('+1 day', $lastDay);
		$nextMonthOfFirstDay = strtotime('+1 day', $lastDay);
		
		//日曆的第一個日期
		if($firstDayOfWeek == 7)
			$firstDate = $firstDay;
		else 
			$firstDate = strtotime('-'. $firstDayOfWeek .' day', $firstDay);
		//日曆的最後一個日期
		if($lastDayOfWeek == 6)
			$lastDate = $lastDay;
		elseif($lastDayOfWeek == 7)	
			$lastDate = strtotime('+6 day', $lastDay);
		else
			$lastDate = strtotime('+'.(6-$lastDayOfWeek).' day', $lastDay);
		
		return array(
				'days' => $days, 
				'firstDayOfWeek' => $firstDayOfWeek, 
				'lastDayOfWeek' => $lastDayOfWeek,
				'lastMonthOfLastDay' => $lastMonthOfLastDay,
				'firstDate' => $firstDate,
				'lastDate' => $lastDate,
				'year' => $year,
				'month' => $month
		);
	}
	/**
	 * $calendar 通过threshold方法计算后的数据
	 * 计算日历的天数与样式
	 */
	function caculate($calendar) {
		$days = $calendar['days'];
		$firstDayOfWeek = $calendar['firstDayOfWeek'];//本月第一天的星期
		$lastDayOfWeek = $calendar['lastDayOfWeek'];//本月最后一天的星期
		$lastMonthOfLastDay = $calendar['lastMonthOfLastDay'];//上个月的最后一天
		$year = $calendar['year'];
		$month = $calendar['month'];
		
		$dates = array();
		if($firstDayOfWeek != 7) {
			$lastDays = array();
			$current = $lastMonthOfLastDay;//上個月最後一天
			for ($i = 0; $i < $firstDayOfWeek; $i++) {
				array_push($lastDays, $current);//增加上一個月的日期天數
				$current--;
			}
			$lastDays = array_reverse($lastDays);//反序
			foreach ($lastDays as $index => $day) {
				array_push($dates, array('day' => $day, 'tdclass' => ($index ==0 ?'rest':''), 'pclass' => 'outter'));
			}
		}
		
		//本月日曆訊息
		for ($i = 1; $i <= $days; $i++) {
			$isRest = $this->_checkIsRest($year, $month, $i);
			//判斷是否是休息天
			array_push($dates, array('day' => $i, 'tdclass' => ($isRest ?'rest':''), 'pclass' => ''));
		}
		
		//下月日曆訊息
		if($lastDayOfWeek == 7) {//最後一天是星期日
			$length = 6;
		}
		elseif($lastDayOfWeek == 6) {//最後一天是星期六
			$length = 0;
		}else {
			$length = 6 - $lastDayOfWeek;
		}
		for ($i = 1; $i <= $length; $i++) {
			array_push($dates, array('day' => $i, 'tdclass' => ($i==$length ?'rest':''), 'pclass' => 'outter'));
		}
		
		return $dates;
	}
	
	/**
	 *  判断是否是休息天
	 */
	private function _checkIsRest($year, $month, $day) {
		$date = mktime(0, 0, 0, $month, $day, $year);
		$week = date("N", $date);
		return $week == 7 || $week == 6;
	}
	
	/**
	 * $caculate 通過caculate方法計算後的數據
	 * 畫表格，設置table中的tr與td
	 */
	function draw($caculate) {
		$tr = array();
		$length = count($caculate);
		$result = array();
		foreach ($caculate as $index => $date) {
			if($index % 7 == 0) {//第一列
				$tr = array($date);
			}elseif($index % 7 == 6 || $index == ($length-1)) {
				array_push($tr, $date);
				array_push($result, $tr);//增加到返回的數據中
				$tr = array();//清空陣列
			}else {
				array_push($tr, $date);
			}
		}
		return $result;
	}
}