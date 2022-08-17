<?php

namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Tests\TestCase;

class PostTest extends TestCase
{
use DatabaseMigrations;
use WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */

    /**
     * @test
     */
    public function user_can_see_index_blog() {
        $user = User::factory()->create();
        $category = Category::factory()->create();
        $data = Post::factory()->create();
        $this->get('/')
            ->assertViewIs('welcome')
            ->assertStatus(200)
            ->assertSee($data->title);
    }

    /**
     * @test
     */
    //testing with user auth
    public function user_can_create_blog() {
        $user = User::factory()->create();
        $category = Category::factory()->create();
        $this->actingAs($user)
            ->get(route('post.create'))
            ->assertStatus(200)
            ->assertSee($category->name)
            ->assertViewIs('pages.posts.create');
    }
    /**
     * @test
     */
    public function user_can_post_blog() {
        $user = User::factory()->create();
        $category = Category::factory()->create();
        $post = Post::factory()->create();
        $this->actingAs($user)
            ->post(route('post.store'),$post->toArray())
            ->assertStatus(302);
    }
}
