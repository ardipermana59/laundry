<?php 

function formatRp($angka){
	$format = number_format($angka,0,',','.');
	$result = 'Rp. ' . $format;
	if($angka == 0){
		$result = '-';
	}
	return $result;
}