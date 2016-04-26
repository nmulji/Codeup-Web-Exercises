<?php

$adjectives = ['good', 'new', 'first', 'last', 'long', 'great', 'little', 'big', 'massive', 'other'];
$nouns = ['lion', 'dog', 'cat', 'fish', 'frog', 'tiger', 'table', 'car', 'chair', 'motorcycle'];

function random ($array1) {
	$random_element = array_rand($array1);
	return $array1[$random_element];
}


$rand_adjective = random($adjectives);

$rand_noun = random($nouns);

?>


<!DOCTYPE html>
<html>
<head>
    <title>Server Name Generator</title>
    <link rel="stylesheet" href="/css/server-name-generator.css">
</head>
<body>
    <h1><?php echo "$rand_adjective" . " " . "$rand_noun\n" . PHP_EOL; ?></h1>
</body>
</html>

