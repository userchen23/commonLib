<?php

/**
 * 
 */
class FileCommon
{
    //the items what should be prohibited 
    private $prohibited_items = ['.' ,'..' ,'.git'];


    //根据目录结构返回某路径下的所有文件
    //必须是绝对路径
    public static function getFileStruct($dir ,$ext_item = []) {
        if (empty($dir) || $dir[0] != '/') {
            return [];
        }

        if (!is_array($ext_item)) {
            return [];
        } else {
            $end_item_list = array_merge($ext_item ,$this->prohibited_items);
        }

        $files = [];
        if (@$handle = opendir($dir)) {
            while (($file = readdir($handle)) !== false) {
                if (!in_array($file ,$end_item_list)) {
                    if (is_dir($dir ."/" .$file)) { //如果是子文件夹，进行递归
                        $files[$file] = $this->getFileStruct($dir ."/" .$file);
                    } else {
                        $files[] = $file;
                    }
                }
            }
            closedir($handle);
        }
        return $files;
    }

    //返回某路径下的所有文件的路径
    //必须是绝对路径
    public static function getFilePath($dir ,$ext_item = []) {
        if (empty($dir) || $dir[0] != '/') {
            return [];
        }

        if (!is_array($ext_item)) {
            return [];
        } else {
            $end_item_list = array_merge($ext_item ,$this->prohibited_items);
        }

        $files = [];
        if (@$handle = opendir($dir)) {
            while (($file = readdir($handle)) !== false) {
                if (!in_array($file ,$end_item_list)) {
                    if (is_dir($dir ."/" .$file)) { //如果是子文件夹，进行递归
                        $files[] = $this->getFilePath($dir ."/" .$file);
                    } else {
                        $files[] = $file;
                    }
                }
            }
            closedir($handle);
        }
        return $files;
    }

}

