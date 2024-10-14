<?php

//$_POST

include "../classes/User.php";

//create object
$user = new User;

//call function
$user->store($_POST['first_name'], $_POST['last_name'], $_POST['username'], $_POST['password']);

