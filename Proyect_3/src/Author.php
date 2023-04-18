<?php

namespace App;

class Author extends User
{
    private $posts = [];
    private $categories = [];

    public function __construct($name, $email, $password)
    {
        parent::__construct($name, $email, $password);
    }

    public function addPost(Post $post)
    {
        $this->posts[] = $post;
    }

    public function addCategory(Category $category)
    {
        $this->categories[] = $category;
    }

    public function countPost()
    {
        return count($this->posts);
    }

    public function countCategories()
    {
        return count($this->categories);
    }
    
    public function getPost()
    {
        return $this->posts;
    }

    public function getCategories()
    {
        return $this->categories;
    }
}