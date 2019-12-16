<?php
function arr_demo($v_arr)
{
$tmp = 0;
	foreach ($v_arr as $element) {
    	if (is_string($element)) {
    		$tmp = $tmp + 1;
    	}
	}
	if ($tmp > 0) {
		return "Achtung! Achtung!";
	} else {
		return $v_arr[2]+$v_arr[5]+$v_arr[7];	
	}
	
}


$arr = array(1,1,1,1,1,-1,1,0,1,1);


$r = arr_demo($arr);
echo $r;