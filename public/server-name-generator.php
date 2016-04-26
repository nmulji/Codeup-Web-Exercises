<?php

function pageController() {

	$adjectives = ['good', 'new', 'first', 'last', 'long', 'great', 'little', 'big', 'massive', 'other'];
	$nouns = ['lion', 'dog', 'cat', 'fish', 'frog', 'tiger', 'table', 'car', 'chair', 'motorcycle'];

	function random ($array1) {
		$random_element = array_rand($array1);
		return $array1[$random_element];
	}

	$data = array();

	$data['adjectives'] = random($adjectives);

	$data['nouns'] = random($nouns);

	return $data;

}

extract(pageController());

?>


<!DOCTYPE html>
<html>
<head>
    <title>Server Name Generator</title>
    <link rel="stylesheet" href="/css/server-name-generator.css">
</head>
<body>
    <h1><?= "$adjectives" . " " . "$nouns\n" . PHP_EOL; ?></h1>
</body>
</html>

