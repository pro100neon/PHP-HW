<?php
function conv_str($v_str)
{
	$v_str = strrev($v_str);
	return $v_str;
}

$r = conv_str('qwerty');
echo $r;