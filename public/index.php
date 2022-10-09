<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/database.php';

use Hillel\Hw6\Models\Category;
use Hillel\Hw6\Models\Post;
use Hillel\Hw6\Models\Tag;

$post = Post::find(5);

$post->title = 'Post title CHANGED';
$post->slug = 'Post slug CHANGED';
$post->body = 'Lorem ipsum ...';
$post->category_id = 4;
$post->save();

