<?php

require_once '../parks_credentials.php';

require_once '../parks_connect.php';

require_once '../Input.php';


if($_SERVER['REQUEST_METHOD'] === 'POST') {

	$errors = [];

	try{
		$name = Input::getString('name', 0, 50);
	} catch (Exception $e){
		$errors['name'] = $e->getMessage();
	}

	try{
		$location = Input::getString('location', 0, 50);
	} catch (Exception $e){
		$errors['location'] = $e->getMessage();
	}

	try{
		$date = Input::get('date_established');
	} catch (Exception $e){
		$errors['date_established'] = $e->getMessage();
	}

	try{
		$area = Input::getNumber('area_in_acres', 0, 1000);
	} catch (Exception $e){
		$errors['area_in_acres'] = $e->getMessage();
	}

	try{
		$description = Input::getString('description', 0, 1000);
	} catch (Exception $e){
		$errors['description'] = $e->getMessage();
	}


	if(empty($errors)) {

		$add_parks = "INSERT INTO national_parks (name, location, date_established, area_in_acres, description)
		VALUES (:name, :location, :date_established, :area_in_acres, :description)";

		$stmt = $dbc->prepare($add_parks);


		$stmt->bindValue(':name', $name, PDO::PARAM_STR);


		$stmt->bindValue(':location', $location, PDO::PARAM_STR);


		$stmt->bindValue(':date_established', $date, PDO::PARAM_INT);


		$stmt->bindValue(':area_in_acres', $area, PDO::PARAM_INT);


		$stmt->bindValue(':description', $description, PDO::PARAM_STR);

		$stmt->execute();

		echo "Inserted park ID: " . $dbc->lastInsertId() . PHP_EOL;
	}

}


function pageController($dbc)
{


	$pageLimit = 4;

	$count = !Input::has('count') ? 0 : Input::get('count');
	$offsetNumber = $count * $pageLimit;

	$parks = [];
	$stmt = $dbc->prepare("SELECT * FROM national_parks LIMIT :pageLimit OFFSET :offsetNumber");
	$stmt->bindValue(':pageLimit', $pageLimit, PDO::PARAM_INT);
	$stmt->bindValue(':offsetNumber', $offsetNumber, PDO::PARAM_INT);
	$stmt->execute();

	$parks['parks'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$parks['count'] = $count; 

	$maxCount = 'SELECT count(*) FROM national_parks';
	$maxCount = $dbc->query($maxCount);
	$maxCount = $maxCount->fetchColumn();
	$maxCount = $maxCount / $pageLimit;
	$maxCount = round($maxCount);

	$parks['maxCount'] = $maxCount;

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

    <link rel="stylesheet" href="/css/national_parks.css">

</head>
<body>

	<!-- Page Links -->

	<div class="page_buttons">
	
		<?php if ($count > 0 && $count < $maxCount) { ?>
			<a class="btn btn-default" href="national_parks.php?count=<?= $count - 1 ?>">Previous</a>
		<?php } ?>

		<?php if ($count < $maxCount - 1) { ?>
			<a class="btn btn-default" href="national_parks.php?count=<?= $count + 1 ?>">Next</a>
		<?php } ?>

	</div>

	<table class="table table-striped table-hover">
	  <thead>
	    <tr>
	      <th class="text-center">Park</th>
	      <th class="text-center">Location</th>
	      <th class="text-center">Date Established</th>
	      <th class="text-center">Area of Acres</th>
	      <th class="text-center">Description</th>
	    </tr>
	  	</thead>
	  	<tbody>
	    <tr> <?php foreach ($parks as $park): ?>
	      <td><?= $park['name']; ?></td>
	      <td><?= $park['location']; ?></td>
	      <td><?= $park['date_established']; ?></td>
	      <td><?= $park['area_in_acres']; ?></td>
	      <td><?= $park['description']; ?></td>
	    </tr>
	  	</tbody>
	  	<?php endforeach ?>
	</table>



	<!-- User Input Form -->

	<button id="show_form" class="btn btn-default">Add Park</button>

	<div class="form_container">
		<form method = "POST" action ="/national_parks.php">
			<div class ="form-group col-xs-6">
				<p>
					<input placeholder="Park Name" class="form-control park_input_fields" id="name" name="name" type="text" value="<?= Input::has ('name') ? Input::get ('name') : ''?>">
				</p>
		        <?php if(isset($errors['name'])): ?>
		            <p><?= $errors['name'] ?></p>
		        <?php endif; ?>
			</div>

			<div class ="form-group col-xs-6">
				<p>
					<input placeholder="Location" class="form-control park_input_fields" id="location" name="location" type="text" value="<?= Input::has ('location') ? Input::get ('location') : ''?>">
				</p>
		        <?php if(isset($errors['location'])): ?>
		            <p><?= $errors['location'] ?></p>
		        <?php endif; ?>
			</div>

			<div class ="form-group col-xs-6">
				<p>
					<input class="form-control park_input_fields" id="date_established" name="date_established" type="date" value="<?= Input::has ('date_established') ? Input::get ('date_established') : ''?>">
				</p>
		        <?php if(isset($errors['date_established'])): ?>
		            <p><?= $errors['date_established'] ?></p>
		        <?php endif; ?>
			</div>

			<div class ="form-group col-xs-6">
				<p>
					<input placeholder="Area in Acres" class="form-control park_input_fields" id="area_in_acres" name="area_in_acres" type="number" value="<?= Input::has ('area_in_acres') ? Input::get ('area_in_acres') : ''?>">
				</p>
		        <?php if(isset($errors['area_in_acres'])): ?>
		            <p><?= $errors['area_in_acres'] ?></p>
		        <?php endif; ?>
			</div>

			<div class ="form-group col-xs-12">
				<p>
					<input placeholder="Describe the park..." class="form-control park_input_fields" id="description" name="description" type="text" value="<?= Input::has ('description') ? Input::get ('description') : ''?>">
				</p>
		        <?php if(isset($errors['description'])): ?>
		            <p><?= $errors['description'] ?></p>
		        <?php endif; ?>
			</div>

			<div class ="form-group col-xs-6">
				<p>
		        	<button type="submit" class="btn btn-default">Submit</button>
		    	</p>
		    </div>
		</div>
	</form>

	<!-- Latest compiled and minified JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

	<!-- JS to hide/show user input -->
	<script>
    "use strict";

    	$(document).ready(function() {

			$('#show_form').click(function() {
	   			$(".form_container").css('visibility', 'hidden');
			});
        });

    </script>

</body>
</html>