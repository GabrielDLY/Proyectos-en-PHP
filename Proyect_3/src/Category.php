<?php 

namespace App;

class Category
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name; 
    }

    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value )
    {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }

        return $this;
    }
}