<?php

class Generate 
{
    public static $adjectives = ["Spotty", "Whispering", "Lazy", "Cuddly", "Relieved", "Jittery", "Confused", "Grumpy", "Shaggy", "Elated"];

    public static $nouns = ["Unicorn", "Chair", "Cat", "Toaster", "Sandwich", "Frog", "Apple", "Princess", "Train", "Fish"];

    public static $colors = ["AliceBlue", "Charteuse", "CadetBlue", "Crimson", "Cyan", "Darkgreen", "DeepSkyBlue", "Gold", "Indigo", "Tomato"];
    public static function getColor() 
    {
        $randomColor = mt_rand(0, 9);
        return self::$colors[$randomColor];
    }

    public static function generatingNames() 
    {
        $length1 = count(self::$adjectives) - 1;
        $length2 = count(self::$nouns) - 1;
        $firstRand = mt_rand(0, $length1);
        $secondRand = mt_rand(0, $length2);
        return self::$adjectives[$firstRand] . " " . self::$nouns[$secondRand];
    }


}