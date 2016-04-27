<?php

function pageController() {

	$correctUser = 'guest';
	$correctPassword = 'password';
	$errorMessage = 'Login Failed!';

	$username = $_POST['username'];
	$password = $_POST['password'];

	if ($username == $correctUser && $password == $correctPassword) {
			header('Location: authorized.php');
	} else {
		echo $errorMessage;
	}
}

if ($_POST) {
	pageController();
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
    </form>
</body>
</html>