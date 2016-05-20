<?php

class InvalidArgument extends Exception {}
class OutOfRangeException extends Exception {}

class Input
{
    /**
     * Check if a given value was passed in the request
     *
     * @param string $key index to look for in request
     * @return boolean whether value exists in $_POST or $_GET
     */

    public static function has($key)
    {
        return isset($_REQUEST[$key]);
    }
    /**
     * Get a requested value from either $_POST or $_GET
     *
     * @param string $key index to look for in index
     * @param mixed $default default value to return if key not found
     * @return mixed value passed in request
     */
    public static function get($key, $default = null)
    {
        return self::has($key) ? $_REQUEST[$key] : $default;
    }
    public static function getString($key)
    {
        if (!is_string(self::get($key)) || is_numeric(self::get($key))) {
            throw new Exception("Error: {$key} must be a string");
        }
        $_REQUEST[$key] = (string)self::get($key);
        return self::get($key);
    }

    public static function getNumber($key, $min = null, $max = null)
    {
        if (!is_numeric(self::get($key))) {
            throw new Exception("Error: {$key} must be a number");
        }
        $_REQUEST[$key] = (int)self::get($key, $min = null, $max = null);
        return self::get($key);
    }
    public static function redirect($input) 
    {
        return header($input);
        die();
    }

    public static function escape($input) 
    {
        return strip_tags(htmlentities($input));
    }
    ///////////////////////////////////////////////////////////////////////////
    //                      DO NOT EDIT ANYTHING BELOW!!                     //
    // The Input class should not ever be instantiated, so we prevent the    //
    // constructor method from being called. We will be covering private     //
    // later in the curriculum.                                              //
    ///////////////////////////////////////////////////////////////////////////
    private function __construct() {}
}
