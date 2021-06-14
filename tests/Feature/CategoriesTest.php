<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class CategoriesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_categories_index()
    {
        $response = $this->get('/');

        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_categories_create()
    {
        $response = $this->get(route('categories.create'));

        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_categories_store()
    {
        $data = [
            'title' => 'Example title',
            'description' => 'Example description',
            'slug' => 'Example slug',
        ];

        $response = $this->post(route('categories.store'), $data);

        $response->assertJson($data);
    }
}
