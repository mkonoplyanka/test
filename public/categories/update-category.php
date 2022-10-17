<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../config/blade.php';

use Hillel\Test\Models\Category;

if (!isset($_GET['id'])) {
    throw new Error('Not found category ID');
}

$category = Category::find($_GET['id']);

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category = Category::find($_POST['id']);
    $category->title = $_POST['title'];
    $category->slug = $_POST['slug'];
    $category->save();
    header('Location: /public/categories/list-categories.php');
}

/** @var $blade */
echo $blade->make('categories/update-category', compact('category'))->render();