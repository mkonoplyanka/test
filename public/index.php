<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/database.php';

use Hillel\Hw6\Models\Category;
use Hillel\Hw6\Models\Post;
use Hillel\Hw6\Models\Tag;

$cat = Category::find(1);

$cat->title = 'Changed title';
$cat->save();