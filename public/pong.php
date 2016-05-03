<?php

require_once '../Input.php';

function pageController() {
	$count = !Input::has('count') ? 0 : Input::get('count');
	return ['count' => $count];
}

extract(pageController());

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
	<h1><?= $count ?></h1>
	<a href="ping.php?count=<?php echo $count + 1 ?>">Hit</a>
	<a href="ping.php?count=<?php echo $count = 0 ?>">Miss</a>
</body>
</html>