<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FacturaTest extends TestCase
{
    use RefreshDatabase;

    public function test_example_factura(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
