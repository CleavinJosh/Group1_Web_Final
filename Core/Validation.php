<?php

class Validation {

    public static function setAttributes( $key, $attribute = [] )
    {
        $_SESSION[$key] = $attribute;
    }

    public  static function unsetAttributes( $key )
    {
        $_SESSION[$key] = [];
    }


}