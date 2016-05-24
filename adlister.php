<?php

require_once 'User.php';

//$secondUser = new User();

//$secondUser->name = 'Raj Mulji';
//$secondUser->email = 'raj.mulji@gmail.com';
//$secondUser->password = 'password2';
//$secondUser->save();

//echo $secondUser->id;

//$firstUser = User::find(9);

//$firstUser->password = 'password1';
//$firstUser->save();

$allUsers = User::all();

var_dump($allUsers);

?>

