<?php

require_once '../Element.php';

function pageController() {

	$element = new Element();

	$result = $element->serverName();

	return $result;


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

