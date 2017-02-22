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

if (!function_exists('wsdl_path')) {
    function wsdl_path($filename)
    {
        return dirname(__FILE__) . '/wsdl/' . $filename;
    }
}

if (!function_exists('compose')) {
    function compose()
    {
        $params = func_get_args();
        $options = [];
        foreach ($params as $param) {
            array_merge($options, $param->toArray());
        }
        return $options;
    }
}