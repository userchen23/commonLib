<?php

function getValue($variable ,$name ,$default = false) {
	if (!is_string($name) && !is_int($name)){
		return $default;
	}
	if (is_array($variable) && isset($variable[$name])) {
		return $variable[$name];
	}
	if (is_array($variable) && isset($variable->$name)) {
		return $variable->$name;
	}
	return $default;
}

$variable = ['arr1' => 'arr1_val' ,'arr2' => 'arr2_val'];
$name = 'arr';
$default = false;

echo 'result is '.PHP_EOL; var_dump(getValue($variable ,$name)); echo PHP_EOL;




