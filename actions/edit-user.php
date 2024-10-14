<?php

include "../classes/User.php";

$user = new User;

//call function
$user->editUser($_POST, $_GET['id']);
