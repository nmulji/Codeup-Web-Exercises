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
        return static::has($key) ? $_REQUEST[$key] : null;
    }

    ///////////////////////////////////////////////////////////////////////////
    //                      DO NOT EDIT ANYTHING BELOW!!                     //
    // The Input class should not ever be instantiated, so we prevent the    //
    // constructor method from being called. We will be covering private     //
    // later in the curriculum.                                              //
    ///////////////////////////////////////////////////////////////////////////
    private function __construct() {}

    public static function getString($key, $min = 1, $max = 1)
    {
        $potentialString = self::get($key);

        if (!is_string($key) || !is_numeric($min) || !is_numeric($max)) {
            throw new InvalidArgumentException ('Input must be a string and min and max must be numbers!');
        } 

        if (empty($potentialString)) {
            throw new OutOfRangeException ('Input must be in range');
        }

        if(!is_string($potentialString)) {
            throw new DomainException ('Value is wrong type');
        }

        if($potentialString < $min || $potentialString > $max) {
            throw new LengthException ('Input is either below or above the allowable characters');
        }

        return $potentialString;
    }

    public static function getNumber($key, $min = 1, $max = 1)
    {
        $potentialNum = self::get($key);

        if (!is_numeric($potentialNum) || !is_numeric($min) || !is_numeric($max)) {
            throw new InvalidArgumentException ('Input must be numeric and min and max must be numbers!');
        }

        if (empty($potentialNum)) {
            throw new OutOfRangeException ('Input must be in range');
        }

        if(!is_numeric($potentialNum)) {
            throw new DomainException ('Value is wrong type');
        }

        if($potentialNum < $min || $potentialNum > $max) {
            throw new RangeException ('Input is either below or above the allowable range');
        }

        $potentialNum = (int)$potentialNum;

        return $potentialNum;
    }
}
