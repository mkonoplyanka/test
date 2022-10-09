<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/database.php';

use Hillel\Hw6\Models\Category;
use Hillel\Hw6\Models\Post;
use Hillel\Hw6\Models\Tag;

$tag = new Tag();

$tag->title = 'Tag title';
$tag->slug = 'Tag slug';
$tag->save();
//x10