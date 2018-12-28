<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DoctorTest extends TestCase
{
    public function test()
    {
        $response = $this->get('/admin-panel/doctor');

        $response->assertStatus(200);
        $response->assertSee('بیمارستان');
    }
}
