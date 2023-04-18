<?php 

namespace App;

class Post
{
    private $title;
    private $content;
    private $categories = [];

    public function __construct($title, $content, Category $categories)
    {
        $this->title = $title;
        $this->content = $content;
        $this->categories = $categories;
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