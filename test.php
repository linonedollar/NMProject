<?php
	$ans = $_GET['data'];
	$data_arr = json_decode($ans,true);
	
	return $ans[0];
?>