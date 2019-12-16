<?php

function dateDemo(int $y,int $m)
{
	if ($y < 0 or $y > 9999 or $m < 1 or $m >12) 
		{
			echo 'Ошибка входящих параметров';
		} else 
			{
				$temp = strtotime('01.'.str_pad($m,2,"0",STR_PAD_LEFT).'.'.$y);
				for($i = strtotime('Tuesday',$temp);$i <= strtotime(date('t',$temp).'.'.date('m.Y',$temp));$i = strtotime('+1 week',$i)) {
					echo date('d-m-Y',$i)."\n";
				};
			}
}


dateDemo(2019,10);
/*
$temp = strtotime('01.'.str_pad('10',2,"0",STR_PAD_LEFT).'.2019');
echo date('m-Y',$temp);
*/

