<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8"/>
	<title>PHP日历</title>
	<link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
<form method="post">
<?php
	require_once 'calendar.php';
	$util = new Calendar();
	$years = array(2012, 2013, 2014, 2015, 2016, 2017, 2018, 2019, 2020, 2021, 2022);
	$months = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12);
	//獲取post的年份數據
	if(empty($_POST['ddlYear'])) {
		$year = date('Y');
	}else {
		$year = $_POST['ddlYear'];
	}
	//獲取post的月份數據
	if(empty($_POST['ddlMonth'])) {
		$month = date('n');
	}else {
		$month = $_POST['ddlMonth'];
	}

	$calendar = $util->threshold($year, $month);//獲取各個邊界值
	$caculate = $util->caculate($calendar);//計算日曆的天數與樣式
	$draws = $util->draw($caculate);//畫表格，設置table中的tr與td
?>
	<div style="padding:20px">
		<select name="ddlYear">
		<?php foreach($years as $data) {?>
			<option value="<?php echo $data?>" <?php if($year == $data) echo 'selected="selected"'?>><?php echo $data?></option>
		<?php }?>
		</select>
		<select name="ddlMonth">
		<?php foreach($months as $data) {?>
			<option value="<?php echo $data?>" <?php if($month == $data) echo 'selected="selected"'?>><?php echo $data?></option>
		<?php }?>
		</select>
		<input type="submit" value="修改"/>
	</div>
	<table width="100%" cellspacing="0" class="table_calendar">
		<thead class="f14">
				<tr>
					<td width="16%">星期日</td>
					<td width="14%">星期一</td>
					<td width="14%">星期二</td>
					<td width="14%">星期三</td>
					<td width="14%">星期四</td>
					<td width="14%">星期五</td>
					<td width="14%">星期六</td>
				</tr>
		</thead>
		<tbody class="f14">
			<?php foreach($draws as $draw) {?>
				<tr>
				<?php foreach($draw as $date) {?>
					<td class="<?php echo $date['tdclass']?>">
						<p class="<?php echo $date['pclass']?>"><?php echo $date['day']?></p>
					</td>
				<?php }?>	
				</tr>
			<?php }?>
		</tbody>
	</table>
</form>
</body>
</html>