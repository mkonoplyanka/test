<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/database.php';
require_once  __DIR__ . '/../src/Models/User.php';

use Hillel\Models\User;

$users = User::find(6);
$users->delete();
//echo '<pre>';
//print_r($users);
//echo '<pre>';
