<?php

namespace Tests\Feature;

use Illuminate\Http\Response;
use Tests\TestCase;

class OrderTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_order_index()
    {
        $response = $this->get('/');

        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_order_store()
    {
        $data = [
            'name' => 'Example name',
            'message' => 'Example message',
        ];

        $response = $this->post(route('order.store'), $data);

        $response->assertStatus(302);
    }
}
