<?php
	var_dump($_GET);
	var_dump($_POST);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>My Third Form</title>
</head>
<body>
	<div id="wrapper">
		<h2>Select Testing</h2>
		<form method="POST" action="/my_third_form.php">
			<label for="question_1">Was it raining outside today?</label>
			<select id="question_1" name="question_1">
			    <option value="1" selected>Yes</option>
			    <option value="0">No</option>
			</select>
			<input type="submit">
		</form>

		<h2>Multiple Choice Test</h2>
		<form method="POST" action="/my_third_form.php">
			<label for="mcquestion_1">What have we learned so far?</label>
			<select id="mcquestion_1" name="mcquestion_1[]" multiple>
			    <option value="HTML">HTML</option>
			    <option value="Sublime Preferences">Sublime Preferences</option>
			    <option value="CSS">CSS</option>
			    <option value="Java">Java</option>
			</select>
			<input type="submit">
		</form>
	</div>
</body>
</html>