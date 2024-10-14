<?php

include "../classes/User.php";

$user = new User;

$user->uploadPhoto($_FILES);

