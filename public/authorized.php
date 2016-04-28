<?php

function pageController() {

$username = $_GET['username'];

	if (isset($_SESSION['logged_in_user'])) {
		echo $username;
	} else {
		header('Location: login.php');
		exit;
	}
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