<?php

/**
 * 
 */
class VaCommonTool
{
    public static function getValue($variable ,$name ,$default = false) {
        if (!is_string($name) && !is_int($name)) {
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
}




