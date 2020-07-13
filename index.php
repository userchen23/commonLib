<?php


include_once('./FileTool/FileCommonTool.php');

//get files name
$dir = dirname(__FILE__);
$files_arr = FileCommonTool::getFilePath($dir ,['index.php']);

//include files

var_dump($dir);
var_dump($files_arr);
