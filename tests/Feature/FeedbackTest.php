<?php

namespace Tests\Feature;

use Illuminate\Http\Response;
use Tests\TestCase;

class FeedbackTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_feedback_index()
    {
        $response = $this->get('/');

        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_feedback_store()
    {
        $data = [
            'name' => 'Example name',
            'message' => 'Example message',
        ];

        $response = $this->post(route('feedback.store'), $data);

        $response->assertStatus(302);
    }
}
