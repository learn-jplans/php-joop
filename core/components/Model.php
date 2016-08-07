<?php 
namespace Core\Components;

abstract class Model
{

    public function __get($property)
    {
        if (property_exists($this, $property)) {
          return $this->$property;
        }
    }

    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
          $this->$property = $value;
        }

        return $this;
    }

    public static function getTableName()
    {
        return end(explode('\\', get_called_class()));
    }

    public function extractObject()
    {
        $tableName = self::getTableName();
        $fields = get_object_vars($this);

        $object = [
          'name' => strtolower($tableName),
          'fields' => $fields,
        ];

        return $object;
    }

}