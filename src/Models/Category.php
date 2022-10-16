<?php

namespace Hillel\Test\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function posts() {
        return $this->hasMany(Post::class);
    }
}