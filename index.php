<?php

require_once 'autoload.php';

use Test\User;
use Test\Model;

$user = new User;
$user->id = 1;
$user->name = 'John';
$user->email = 'some@gmail.com';
$result = $user->save();
var_dump($result);


