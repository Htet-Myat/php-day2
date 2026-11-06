<?php

class Counter
{

    public static $count = 0;

    public static function increment()
    {

        self::$count++;
    }
}


Counter::increment();
Counter::increment();
Counter::increment();


echo "Total Count: " . Counter::$count;
