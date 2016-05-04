<?php

require_once '../Auth.php';
require_once '../Input.php';

// clear session data in memory & on disk and send user a new session cookie
function clearSession()
{
	Auth::logout();
}

// start the session (or resume an existing one)
// this function must be called before trying to get or set any session data!
session_start();

clearSession();

header('Location: login.php');


// ...

?>