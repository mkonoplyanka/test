<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../config/blade.php';

use Hillel\Test\Models\Tag;

$tags = Tag::all();

/** @var $blade */
echo $blade->make('tags/list-tags', compact('tags'))->render();