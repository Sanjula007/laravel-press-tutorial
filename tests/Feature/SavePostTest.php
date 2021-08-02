<?php
/**
 * Created by PhpStorm.
 * User: sanjulah
 * Date: 11/5/2019
 * Time: 9:47 AM
 */

namespace sanjula007\Press\Tests;


use Illuminate\Foundation\Testing\RefreshDatabase;
use sanjula007\Press\Post;


class SavePostTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_post_can_be_created_with_the_factory()
    {
        $this->withoutExceptionHandling();
        $post = factory(Post::class)->create();
        $this->assertCount(1, Post::all());
    }
}
