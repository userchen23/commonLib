<?php


//返回根据目录结构返回某路径下的所有文件
//禁止传入 './' '../'
function getFiles($dir) {
	if (empty($dir) || !is_string($dir) || $dir[0] == '.'){
		return [];
	}
	$files = [];
	if(@$handle = opendir($dir)) {
		while(($file = readdir($handle)) !== false) {
			if($file != ".." && $file != "." && $file != ".git") {
				if(is_dir($dir . "/" . $file)) { //如果是子文件夹，进行递归
					$files[$file] = getFiles($dir . "/" . $file);
				} else {
					$files[] = $file;
				}
			}
		}
        closedir($handle);
    }
	return $files;
}

//获取路径下所有文件的路径
function getFilePath($dir , (bool) $relative = true) {
        if (empty($dir) || !is_string($dir) || $dir[0] == '.'){
                return [];
        }
        $files = [];
        if(@$handle = opendir($dir)) {
                while(($file = readdir($handle)) !== false) {
                        if($file != ".." && $file != "." && $file != ".git") {
                                if(is_dir($dir . "/" . $file)) { //如果是子文件
夹，进行递归
                                        $files[$file] = getFiles($dir . "/" . $
file);
                                } else {
                                        $files[] = $file;
                                }
                        }
                }
        	closedir($handle);
	}
	return $files;
}

var_dump(getFiles('../'));

