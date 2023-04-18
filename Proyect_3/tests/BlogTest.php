<?php

use PHPUnit\Framework\TestCase;
use App\Author;
use App\Category;
use App\Post;

class BlogTest extends TestCase
{
    public function test_add_post()
    {
        $author = new Author('Leon', 'leonsk@gmail.com', 'leonr4');
        $category = new Category('Courses');
        $post = new Post('First Post', 'Content Post', $category);

        $author->addPost($post);

        $this->assertEquals(1,$author->countPost());
        $this->assertInstanceOf(Post::class, $author->getPost()[0]);
    }

    public function test_add_category()
    {
        $author = new Author('Leon', 'leonsk@gmail.com', 'leonr4');
        $category = new Category('code');

        $author->addCategory($category);

        $this->assertEquals(1,$author->countCategories());
        $this->assertInstanceOf(Category::class, $author->getCategories()[0]);
    }


}
