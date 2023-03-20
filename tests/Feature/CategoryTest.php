<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testGetCategories()
    {
        $response = $this->get('/api/categories');

        $response->assertStatus(200);
        $this->assertArrayHasKey('data', $response->json());
    }

    public function testGetCategoriesById()
    {
        $response = $this->get('/api/categories/24');

        $response->assertStatus(200);
    }

    public function testPostCategories()
    {
        $response = $this->post('/api/categories', [
            'name' => 'Test Category',
            'is_publish' => true
        ]);

        $response->assertStatus(200);
    }

    public function testPutCategories()
    {
        $response = $this->put('/api/categories/51', [
            'name' => 'Test Category',
            'is_publish' => true
        ]);

        $response->assertStatus(200);
    }

    public function testDeleteCategories()
    {
        $response = $this->delete('/api/categories/76');

        $response->assertStatus(200);
    }
}
