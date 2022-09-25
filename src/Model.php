<?php

namespace Test;

 abstract class Model
 {
    public static function find($id)
    {
        $tableName = static::tableName();
        $sql = 'SELECT * FROM ' . $tableName . ' WHERE id = :id';
        return $sql;
    }
    abstract public static function tableName();

    public function create()
    {
        $data = get_object_vars($this);
        $property = array_keys($data);
        $bindProperty = array_map(function ($item) {
            return ':' . $item;
        }, $property);
        $tableName = static::tableName();
        $sql = 'INSERT INTO ' . $tableName . ' (' . implode(', ', $property) . ') 
                VALUES (' . implode(', ', $bindProperty) . ')';
        return $sql;
    }

     public function update()
     {
         $data = get_object_vars($this);
         $property = array_keys($data);
         $prop2 = array_map(function ($item) {
             return ':' . $item;
         }, $property);
         $tableName = static::tableName();
         $sql = 'UPDATE ' . $tableName . ' SET name = ' . $prop2[1] . ', email = ' . $prop2[2] .
                ' WHERE id = ' .  $prop2[0] . '';
         return $sql;
     }

     public function delete()
     {
         $tableName = static::tableName();
         $sql = 'DELETE * FROM ' . $tableName . ' WHERE id = :id';
         return $sql;
     }
 }

