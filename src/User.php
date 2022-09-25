<?php

namespace Test;

use Test\Model;

class User extends Model
{
    public $id;
    public $name = 'name';
    public $email = 'email';

    public function __construct($id = NULL, $name = 'name', $email = 'email')
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }

    public static function tableName()
    {
        return 'user';
    }

    public function save()
    {
        $id = $this->id;

        if($id == NULL) {
            $obj = new User();
            return $obj->create();
        }
        $obj = new User();
        return $obj->update();
    }
}