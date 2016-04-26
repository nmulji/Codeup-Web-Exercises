<?php

function pageController() {

	$fav_things = ['pizza', 'motorcycles', 'basketball', 'coding', 'Texas'];

	$data = array();

	$data['favThings'] = $fav_things;

	return $data;

}

extract(pageController());

?>

<!DOCTYPE html>
<html>
<head>
    <title>Favorite Things</title>
    <link rel="stylesheet" href="/css/my-favorite-things.css">
</head>
<body>
    <table>
    	<tr>
    		<th>Favorite Thing 1</th>
        	<th>Favorite Thing 2</th>
        	<th>Favorite Thing 3</th>
        	<th>Favorite Thing 4</th>
        	<th>Favorite Thing 5</th>
    	</tr>
    	<tr>
    		<?php foreach ($favThings as $favoriteThing): ?> 
    		<td><?= $favoriteThing; ?></td>
    		<?php endforeach; ?>
    	</tr>
    </table>
</body>
</html>