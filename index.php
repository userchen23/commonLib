<?php


include_once('./FileTool/common.php');

//get files name
$dir = dirname(__FILE__);
$files_arr = getFiles($dir);

//include files

var_dump($dir);
var_dump($files_arr);
