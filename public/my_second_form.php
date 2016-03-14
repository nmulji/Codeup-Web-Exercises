<?php
	var_dump($_GET);
	var_dump($_POST);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>MY Second HTML Form</title>
	</head>
	<body>
	<h2>My Second HTML Form</h2>
	<h4>Log In</h4>
	<form method="POST" action="/my_second_form.php">
		<input type="hidden" name="action" value="login">
	    <p>
	        <input id="username" name="username" type="email" placeholder="E-Mail" value="email@email.com">
	    </p>
	    <p>
	        <input id="password" name="password" type="password" placeholder="Password">
	    </p>
	    <p>
	    	<textarea name="manifesto" placeholder ="Write your manifesto here">
</textarea>
	    </p>
	    <p>
	    	<input type="submit" value="Log In">
	    </p>
	</form>

<h4>Sign Up</h4>

	<form method="POST" action="/my_second_form.php">
			<input type="hidden" name="action" value="signup">
		    <p>
		        <input id="username" name="username" type="email" placeholder="E-Mail" value="email@email.com">
		    </p>
		    <p>
		        <input id="password" name="password" type="password" placeholder="Password">
		    </p>
		    <p>
		        <input id="confirm password" name="confirm password" type="confirm password" placeholder="Confirm Password">
		    </p>
		    <p>
		    	<input type="submit" value="Sign Up">
		    </p>
	</form>

<h2>User Login</h2>

	<form method="POST" action="/my_second_form.php">
			<input type="hidden" name="action" value="login">
		    <p>
		        <input id="username" name="username" type="email" placeholder="E-Mail" value="email@email.com">
		    </p>
		    <p>
		        <input id="password" name="password" type="password" placeholder="Password">
		    </p>
		    <p>
		    	<input type="submit" value="Log In">
		    </p>
	</form>

<h2>Compose an E-Mail</h2>

	<form method="POST" action="/my_second_form.php">
			<p>
				<input id="To" name="To" type="email" placeholder="To">
			</p>
			<p>
				<input id="From" name="From" type="email" placeholder="From">
			</p>
			<p>
				<input id="Subject" name="Subject" type="text" placeholder="Subject">
			</p>
			<p>
	    	<textarea name="text" placeholder ="Write here">
</textarea>
	    </p>
	    <p>
	    	<input type="submit" value="Send">
	    </p>
	    <p>
	    	<label for="save_a_copy">Save A Copy To Send Folder?</label>
	    	<input type="checkbox" name="save_a_copy" value="yes" id="save_a_copy" checked>
	    </p>
	</form>

<h2>Multiple Choice Test</h2>

<form method="POST" action="/my_second_form.php">
		<p>
			<p>Do you know how to code?</p>
			<input type="radio" name="know_code" value="yes" id="yes">
			<label for="yes">Yes</label>
			<input type="radio" name="know_code" value="no" id="no">
			<label for="no">No</label>
		</p>
		<p>
			<p>Do you like to code?</p>
			<input type="radio" name="like_code" value="yes" id="yes">
			<label for="yes">Yes</label>
			<input type="radio" name="like_code" value="no" id="no">
			<label for="no">No</label>
		</p>
		<p>
			<p>What have you learned so far at Codeup?</p>
			<p><em><strong>Check all that apply:</strong></em></p>
		</p>
		<p>
			<input type="checkbox" name="HTML" value="yes" id="HTML">
			<label for="yes">HTML</label>
			<input type="checkbox" name="Terminal" value="yes" id="Terminal">
			<label for="yes">Terminal</label>
			<input type="checkbox" name="CSS" value="yes" id="CSS">
			<label for="yes">CSS</label>
			<input type="checkbox" name="Java" value="yes" id="Java">
			<label for="yes">Java</label>
		</p>
		<p>
		<input type="submit" value="Complete Test">
		</p>
</form>
	</body>
</html>