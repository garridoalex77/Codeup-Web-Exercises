<?php

class Model 
{
    private $atttributes = [];

    protected static $table = 'model';

    public static function getTableName()
    {
        return static::$table;
    }

    public function __set($name, $value)
    {
        $this->atttributes[$name] = $value;
    }

    public function __get($name)
    {
        return array_key_exists($name, $this->atttributes) ? $this->attributes['name'] : null;
    }
}