<?php
	$query = " SELECT COUNT(*) FROM post WHERE user_id = '".$_GET['id']."'";
	$result = mysql_query($query) or die ( "Error : ".mysql_error() );
	$row = mysql_fetch_array($result);
	$total = $row[0];
	
	$q = " SELECT SUM(peace_count) FROM post WHERE user_id = '".$_GET['id']."'";
	$res = mysql_query($q) or die ( "Error : ".mysql_error() );
	$rw = mysql_fetch_array($res);
	$sum = $rw[0];
	if($sum == 0){
		$sum = 0;
	}
	
	$qr = " SELECT SUM(peace_count) FROM post WHERE user_id = '".$_GET['id']."'";
	$rs = mysql_query($q) or die ( "Error : ".mysql_error() );
	$r = mysql_fetch_array($rs);
	$s = $sum/$total;
	$rait = mb_substr($s, 0, 3, 'UTF-8');
	
?>
<div class="count_info"><span style="color: #F6BA39;"><?php echo $sum; ?></span></div>
<div class="count_info"><span style="color: #2A8925;"><?php echo $total; ?></span></div>
<div class="count_info"><span style="color: #3E80B7;"><?php echo $rait; ?></span></div>