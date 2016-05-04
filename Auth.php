<?php

require_once 'Log.php';
require_once 'Input.php';

class Auth
{
    public static $password = '$2y$10$SLjwBwdOVvnMgWxvTI4Gb.YVcmDlPTpQystHMO2Kfyi/DS8rgA0Fm';

    public static function attempt($username, $password)
    {
        $correctUser = 'guest';
        //$correctPassword = $password;
        $correctMessage = 'User $username logged in.';

        if ($username == $correctUser && password_verify($password, self::$password)) {
                $_SESSION['logged_in_user'] = $username;
                return TRUE;
        } else {
            $Log = new Log;
            $Log->info($errorMessage);
            return FALSE;
        }
    }

    public static function check()
    {
        $username = Input::get('username');

        if (isset($_SESSION['logged_in_user'])) {
            return TRUE;
        } else {
            header('Location: login.php');
            return FALSE;
        }
    }

    public static function user()
    {
       return $username;
    }

    public static function logout()
    {
        session_unset();
        session_regenerate_id(true);
    }

}