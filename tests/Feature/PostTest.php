<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Post;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function testCanCreatePost()
    {
        $post = factory(Post::class)->create();

        $this->assertDatabaseHas('posts', ['id' => $post->id]);
    }

    public function testCanUpdatePost()
    {
        $post = factory(Post::class)->create();
        $post->title = 'Updated title';
        $post->save();

        $this->assertDatabaseHas('posts', ['id' => $post->id, 'title' => 'Updated title']);
    }

    public function testCanDeletePost()
    {
        $post = factory(Post::class)->create();
        $post->delete();

        $this->assertDatabaseMissing('posts', ['id' => $post->id]);
    }
}