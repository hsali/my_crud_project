<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;


class PostTest extends TestCase
{
    use RefreshDatabase;

    public function testCanCreatePost(){
        $post = Post::factory()->create();
        // $post = factory(Post::class)->create();
        


        $this->assertDatabaseHas('posts', ['id' => $post->id]);
    }

    public function testCanUpdatePost()
    {
        $post = Post::factory()->create();
        $post->title = 'Updated title';
        $post->save();

        $this->assertDatabaseHas('posts', ['id' => $post->id, 'title' => 'Updated title']);
    }

    public function testCanDeletePost()
    {
        $post = Post::factory()->create();
        $post->delete();

        $this->assertDatabaseMissing('posts', ['id' => $post->id]);
    }
}