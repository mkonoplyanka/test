<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../config/blade.php';

use Hillel\Test\Models\Tag;

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tag = new Tag();
    $tag->title = $_POST['title'];
    $tag->slug = $_POST['slug'];
    $tag->save();
}

/** @var $blade */
echo $blade->make('tags/create-tag')->render();