<?php

namespace Test;

use Test\Model;

class User extends Model
{
    public $id;
    public $name;
    public $email;

    public static function tableName()
    {
        return 'user';
    }
}