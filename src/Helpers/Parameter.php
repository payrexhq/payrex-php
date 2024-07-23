<?php

namespace Payrex\Helpers;

class Parameter {
  public static function encode($params, $prefix = '') {
    $final_query = [];

    foreach ($params as $key => $value) {
        $newKey = $prefix === '' ? $key : $prefix . '[' . $key . ']';

        if($prefix === '') {
            $newKey = $key;
        } else {
            if(is_numeric($key) && !is_array($value)) {
                $newKey = $prefix . '[]';
            } else {
                $newKey = $prefix . '[' . $key . ']';
            }
        }

        if (is_array($value)) {
            $final_query[] = self::encode($value, $newKey);
        } else {
            $final_query[] = urlencode($newKey) . '=' . urlencode($value);
        }
    }

    return implode('&', $final_query);
  }
}