<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Category;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use DatabaseMigrations;
    use WithFaker;
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    /**
     * @test
     */

    public function user_can_see_index_category(){
        $user = User::factory()->create();
        $category = Category::factory()->create();
        $this->actingAs($user)
            ->get('/category')
            ->assertStatus(200)
            ->assertSee($category->name)
            ->assertViewIs('pages.category.index');
    }

    /**
     * @test
     */
    public function user_can_create_category() {
        $user = User::factory()->create();
        $this->actingAs($user)
            ->get('/category/create')
            ->assertStatus(200)
            ->assertViewIs('pages.category.create');
    }
}
