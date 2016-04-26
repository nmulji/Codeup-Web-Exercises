<?php
function pageController() {
	$count = !isset($_GET['count']) ? 0 : $_GET['count'];
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
	<a href="counter2.php?count=<?php echo $count + 1 ?>">Up</a>
	<a href="counter2.php?count=<?php echo $count - 1 ?>">Down</a>
</body>
</html>