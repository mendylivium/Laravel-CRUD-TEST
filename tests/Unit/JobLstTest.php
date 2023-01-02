<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Jobs;

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

        factory(Jobs::class,10)->create();

        $job = Jobs::first();
        
        $this->assertTrue($job != null);
    }
}
