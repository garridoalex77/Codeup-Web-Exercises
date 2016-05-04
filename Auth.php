<?php
require_once 'Log.php';
require_once 'Input.php';

class Auth 
{
     public static $password = '$2y$10$SLjwBwdOVvnMgWxvTI4Gb.YVcmDlPTpQystHMO2Kfyi/DS8rgA0Fm';

     public static function attempt($username, $password) 
     {
        $userLogin = new Log("users");
        if ($username == "guest" && password_verify($password, self::$password)) {
            $_SESSION["logged_in_usr"] = Input::get("name");
            $userLogin->logInfo("user {$username} logged in"); 
        } else {
            $userLogin->logError("user {$username} failed to login");
            
        }
     }
     public static function check() 
     {
        return isset($_SESSION["logged_in_usr"]);
     }
     public static function user() 
     {
        return $_SESSION["logged_in_usr"];
     }
     public static function logout() 
     {
        session_unset();
        session_regenerate_id(true);
     }

}