<?php

require_once '../Auth.php';
require_once '../Input.php';

session_start();

$errorMessage = '';


if ($_POST) {
	$errorMessage = pageController();
}

function pageController() {

	$username = Input::get('username');
    $password = Input::get('password');
    $errorMessage = 'User $username failed to log in!';

	if(Auth::attempt($username, $password) == TRUE) {
		header('Location: authorized.php');
	} else {
		return $errorMessage;
	}

}


if (isset($_SESSION['logged_in_user'])) {
	header('Location: authorized.php');
	exit;
}


?>


<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <form method="POST">
        <label>Username</label>
        <input type="text" name="username"><br>
        <label>Password</label>
        <input type="text" name="password"><br>
        <input type="submit">
        <p> <?php echo $errorMessage ?></p>
    </form>
</body>
</html>