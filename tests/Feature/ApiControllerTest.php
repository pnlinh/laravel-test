<?php

namespace Tests\Feature;

use Illuminate\Http\Response;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiControllerTest extends TestCase
{
    /**
     * Test API Question
     *
     * @author pnlinh
     */
    public function test_api_get_questions()
    {
        $response = $this->get(route('api.get_questions'));

        $response->assertStatus(Response::HTTP_OK)->assertJsonStructure([
                'uid',
                'data' => [
                    '*' => [
                        'q_no',
                        'q_no_internal',
                        'q_text',
                        'q_select_a',
                        'q_select_b',
                        'q_select_c',
                        'q_select_d',
                    ],
                ],
            ]);

        $data = json_decode($response->getContent(), true);
        $this->assertCount(4, $data['data']);
    }
}
