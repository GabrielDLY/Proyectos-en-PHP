<?php

namespace App;

class User
{
    protected $name;
    protected $email;
    protected $password;
    protected $create_at;
    protected $update_at;
    protected $delete_at;

    public function __construct($name, $email, $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            return $this->$property = $value;
        }

        return $this;
    }
}