<?php

namespace Tests\Feature;

use App\Service\HelloService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HelloControllerTest extends TestCase
{
  
    public function testHello(){
        $this->get("/controller/hello/fredik")->assertSeeText("Halo fredik");
    }

    public function testRequest(){
        $this->get('/controller/hello/request',[
            "Accept" => "plain/text"
        ])->assertSeeText("controller/hello/request")
            ->assertSeeText("http://localhost/controller/hello/request")
            ->assertSeeText("GET")
            ->assertSeeText("plain/text");
    }
}
