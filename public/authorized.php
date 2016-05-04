<?php

require_once '../Auth.php';
require_once '../Input.php';

function pageController() {

	Auth::check();
}

if ($_POST) {
	pageController();
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Authorized</title>
</head>
<body>
	<h1>Authorized</h1>
	<a href="login.php">Back</a>
	<a href="logout.php">Logout</a>
</body>
</html>