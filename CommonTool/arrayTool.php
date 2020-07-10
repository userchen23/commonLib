<?php
 

function buildArray($variable) {

	$result = [];
	if (is_object($variable) || is_array($variable) ) {
		foreach($variable as $key => $value) {
			$result[$key] = buildArray($value);
		}
	}else {
		$result = $variable;
	}

	return $result;

}
