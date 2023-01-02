<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\JobsTest;

class JobLstTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    use RefreshDatabase;

    public function test_input_testDB()
    {   

        $dummy_db = [
            'job_name' => 'Dummy Text',
            'job_description' => 'Dummy Text'
        ];

        $job = JobsTest::create($dummy_db);

        
        $this->assertTrue($job != null);
    }
}
