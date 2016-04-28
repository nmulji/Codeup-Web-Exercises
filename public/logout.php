<?php

require 'functions.php';

// clear session data in memory & on disk and send user a new session cookie
function clearSession()
{
    // clear $_SESSION array
    session_unset();

    // delete session data on the server and send the client a new cookie
    session_regenerate_id(true);
}

// start the session (or resume an existing one)
// this function must be called before trying to get or set any session data!
session_start();

clearSession();

header('Location: login.php');


// ...

?>