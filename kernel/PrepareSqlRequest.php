<?php

namespace Keha\Kernel;

class PrepareSqlRequest {

    public static function sanitize(array $values): array
    {
        $return = [];
        foreach($values as $value) {
            if ($value !== NULL && !is_numeric($value)) {
                $return[] = htmlentities($value);
            } else {
                $return[] = $value;
            }
            
        }
        return $return;
    }
}