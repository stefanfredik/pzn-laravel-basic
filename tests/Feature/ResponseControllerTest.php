<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ResponseControllerTest extends TestCase
{
    public function testResonpose()
    {
        $this->get('/response/hello')->assertStatus(200)->assertSeeText("hello response");
    }
}
