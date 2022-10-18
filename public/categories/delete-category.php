<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../config/blade.php';

use Hillel\Test\Models\Category;

if(!isset($_GET['id'])) {
    throw new Error('Not found category ID');
}

$delete = Category::find($_GET['id'])->delete();
header('Location: /public/categories/index.php' );
