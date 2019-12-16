<?php
$i = 5;

while ($i < 31) {
	echo 'пн. - '.str_pad($i,2,"0",STR_PAD_LEFT).'.08.2019'."\n";
	$i+=7;
}