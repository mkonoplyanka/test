<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once  __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../config/blade.php';

use Hillel\Test\Models\Tag;

if(!isset($_GET['id'])) {
    throw new Error ('Not found tag ID');
}

$tag = Tag::find($_GET['id']);

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tag->title = $_POST['title'];
    $tag->slug = $_POST['slug'];
    $tag->save();
    header('Location: /public/tags/index.php');
}

/** @var $blade */
echo $blade->make('tags/update-tag', compact('tag'))->render();