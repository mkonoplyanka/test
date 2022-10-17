<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../config/blade.php';

use Hillel\Test\Models\Category;

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category = new Category();
    $category->title = $_POST['title'];
    $category->slug = $_POST['slug'];
    $category->save();
}

/** @var $blade */
echo $blade->make('categories/create-category')->render();