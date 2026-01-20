<?php

class Helpers
{
    public static function filled($value)
    {
        if (is_null($value)) {
            return false;
        }

        if (is_array($value)) {
            return !empty($value);
        }

        return !empty(trim($value));
    }
}
