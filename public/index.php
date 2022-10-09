<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/database.php';

use Hillel\Hw6\Models\Category;
use Hillel\Hw6\Models\Post;
use Hillel\Hw6\Models\Tag;

$post = new Post();

$post->title = 'Post title';
$post->slug = 'Post slug';
$post->body = 'Lorem ipsum ...';
$post->category_id = 1;
$post->save();
//x10
