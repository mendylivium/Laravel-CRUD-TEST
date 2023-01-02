<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HttpControllersJobListTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_render_home()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_create_job()
    {

        $dummy_data = [
            'job_name' => 'This is a Test Job Name',
            'job_description' => 'This is a Test Job Description'
        ];

        $response = $this->post('/',$dummy_data);

        $response->assertStatus(201)
            ->assertJson(['result' => 'success', 'text' => 'Job Successfully listed']);
    }

    public function test_delete_job()
    {
      $response = $this->delete('/2');
      $response->assertStatus(200);
    }

    public function test_done_job()
    {
      $response = $this->post('/done/2');
      $response->assertStatus(200);
    }

}
