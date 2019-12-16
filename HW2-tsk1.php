<?php
$i =0;


$r = 2 **$i;

while ($r < 10000) {
	echo $r."\n";
	$i++;
	$r = 2 **$i;
}