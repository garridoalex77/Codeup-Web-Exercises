<?php
require_once "Log.php";
require_once 'Input.php';

class Auth 
{
     public static $password = '$2y$10$SLjwBwdOVvnMgWxvTI4Gb.YVcmDlPTpQystHMO2Kfyi/DS8rgA0Fm';

     public static function attempt($username, $password) 
     {
        if ($username == "guest" && password_verify("password", self::password)) {
            $_SESSION["logged_in_usr"] = Input::get("name");
            $userLogin = new Log("users.txt");
            $userLogin->logInfo("user {$username} logged in"); 
        } else {
            $userLogin = new Log("users.txt");
            $userLogin->logError("user {$username} failed to login");
            
        }
     }
     public static function check() 
     {
        if ($_SESSION["logged_in_usr"]) {
            return true;
        } else {
            return false;
        }
     }
     public static function user() 
     {
        return $_SESSION["logged_in_usr"];
     }
     public static function logout() 
     {
        session_start();
        session_unset();
        session_regenerate_id(true);
        header("Location: login.php");
        die();
     }

}