<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../config/blade.php';

use Hillel\Test\Models\Tag;

if (!isset($_GET['id'])) {
    throw new Error ('Not found tag ID');
}

$delete = Tag::find($_GET['id'])->delete();
header('Location: /public/tags/index.php');