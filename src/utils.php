<?php
if (!function_exists('arr_set')) {
    function arr_set(&$array, $keys, $value)
    {
        if (strpos($keys, '.')) {
            $parts = explode('.', $keys);
            while (count($parts) > 1) {
                $part = array_shift($parts);
                if (isset($array[$part]) && is_array($array[$part])) {
                    $array = &$array[$part];
                }
            }
        } else {
            $array[$keys] = $value;
        }
    }
}