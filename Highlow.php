<?php
require 'Input.php';

class Highlow 
{
    public $guessCount = 0;
    public static $randomNum;
    public static function getRange() 
    {
        $lowNum = Input::get("low");
        $highNum = Input::get("high");
        if (!is_numeric($lowNum) && !is_numeric($highNum)) {
            $randomNum = mt_rand(0, 100);
            $_SESSION["low"] = 1;
            $_SESSION["high"] = 100;
        } elseif ($lowNum > $highNum) {
            $randomNum = mt_rand($highNum, $lowNum);
            $_SESSION["low"] = $highNum;
            $_SESSION["high"] = $lowNum;
        } elseif ($lowNum == $highNum) {
            $randomNum = mt_rand(0, 1000);
            $_SESSION["low"] = 0;
            $_SESSION["high"] = 1000;
        } else {
            $randomNum = mt_rand($lowNum, $highNum);
            $_SESSION["low"] = $lowNum;
            $_SESSION["high"] = $highNum;
        }
        return $_SESSION["randomNum"] = $randomNum;
        
        ;
    }

    public static function getNumber($key)
    {
        return $_SESSION["{$key}"];
    }

    public static function checkGuess()
    {
        if ($_REQUEST["guess"] == $_SESSION["randomNum"]) {
            var_dump('expression');
            session_unset();
            session_regenerate_id(true);
            Input::redirect("Location: highlowgame.php");
        }   
    }

    











    public static function runGame() 
    {
        do 
        {
            $guessCount++;
            $guess = trim(fgets(STDIN));
            if ($guess == $randomNum) {
                // echo "it only took you " .$guessCount. " tries\n";
                // echo "somehow...you cheated\n";
            } elseif ($guess > $randomNum) {
                // echo "too high\n";
            } elseif ($guess < $randomNum) {
                // echo "too low\n";
            }
            $hint = $randomNum - $guess;
            if ($hint < 10 && $hint > -10) {
                // echo "hot\n";
            } else {
                // echo "cold\n";
            }
        } while ($guess != $randomNum && $guess != "exit");
    }

    // echo "Would you like to play again?");
    // public $again = trim(fgets(STDIN));

    // if ($again == "y" || $again == "yes") {
    //     goto start;
    // }
}