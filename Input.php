<?php
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
    // $key-not str $min, $max-not num  InvalidAE
    //missing key OutofRange
    //wrong type value DomainException
    //str value shorter than min or longer than max LengthException
    // num value less than $min or greater than $max RangeException
    public static function getString($key, $min = 5, $max = 50)
    {
        $value = self::get($key);
        $valueLength = strlen($value);
        if (!is_string($key) || !is_numeric($min) || !is_numeric($max)) {
            throw new InvalidArgumentException("Error: {$key} must be a string and min/max must be numbers");
        } elseif (empty($key)) {
            throw new OutOfRangeException("Error: {$key} is empty");
        } elseif (!is_string($value) || is_numeric($value)) {
            throw new DomainException("Error: {$key} must be a string");
        } elseif ($valueLength < $min || $valueLength > $max) {
            throw new LengthException("Error: {$key} must be between 5 and 50 characters");
        }
        $_REQUEST[$key] = (string)$value;
        return $value;
    }

    public static function getNumber($key, $min = 0, $max = 50)
    {
        $value = self::get($key);
        $valueLength = strlen((string)$value);
        if (!is_string($key) || !is_numeric($min) || !is_numeric($max)) {
            throw new InvalidArgumentException("Error: {$key} must be a string and min/max must be numbers");
        } elseif (empty($key)) {
            throw new OutOfRangeException("Error: {$key} is empty");
        } elseif (!is_numeric($value)) {
            throw new DomainException("Error: {$key} must be a number");
        } elseif ($valueLength < $min || $valueLength > $max) {
            throw new LengthException("Error: {$key} must be between 5 and 50 characters");
        }
        $_REQUEST[$key] = (int)$value;
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
