<?php
if (!function_exists('arr_set')) {
    function arr_set(&$array, $keys, $value)
    {
        if (is_null($keys)) {
            return $array = $value;
        }
        $keys = explode('.', $keys);

        while (count($keys) > 1) {
            $key = array_shift($keys);
            if (!isset($array[$key]) || !is_array($array[$key])) {
                $array[$key] = [];
            }
            $array = &$array[$key];
        }
        $array[array_shift($keys)] = $value;
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