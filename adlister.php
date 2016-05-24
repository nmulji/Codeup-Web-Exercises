<?php

require_once 'User.php';

$firstUser = new User();

$firstUser->name = 'Niraj Mulji';
$firstUser->email = 'niraj.mulji@gmail.com';
$firstUser->password = 'password';
$firstUser->save();

echo $firstUser->id;

?>

