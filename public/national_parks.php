<?php

require_once '../parks_credentials.php';

require_once '../parks_connect.php';

function pageController($dbc)
{

	$parks = [];
	$stmt = $dbc->query('SELECT * FROM national_parks');
	$parks['parks'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $parks;

}

    extract(pageController($dbc));

?>

<!DOCTYPE html>
<html>
<head>
    <title>National Parks</title>

        <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!--Google Fonts -->

    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>


</head>
<body>

	<table class="table table-striped">
	  <thead>
	    <tr>
	      <th>Park</th>
	      <th>Location</th>
	      <th>Date Established</th>
	      <th>Area of Acres</th>
	    </tr>
	  	</thead>
	  	<tbody>
	    <tr> <?php foreach ($parks as $park): ?>
	      <td><?= $park['name']; ?></td>
	      <td><?= $park['location']; ?></td>
	      <td><?= $park['date_established']; ?></td>
	      <td><?= $park['area_in_acres']; ?></td>
	    </tr>
	  	</tbody>
	  	<?php endforeach ?>
	</table>


    <!-- Latest compiled and minified JavaScript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>