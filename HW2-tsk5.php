<?php
function arr_demo(array $v_arr,string $v_str)
{
	if (!$v_arr === array() or is_null($v_str)) 
		{
			$r = false;
		} else 
			{
				foreach ($v_arr as &$element) 
					{
						$element = $element.$v_str;
					}
				$r = $v_arr;
			}
return $r;
}


$arr = array(1,0);


$res = arr_demo($arr,'.!.');

if ($res) {
	foreach ($res as $element) 
					{
						echo $element."\n";
					}

} else echo 'false';