<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InputControllerTest extends TestCase
{
    function testInput(){
        $this->get("/input/hello?name=fredik")->assertSeeText("Hello fredik");
        $this->post("/input/hello",[
            'name' => 'Fredik'
        ])->assertSeeText('Hello Fredik');
    }


    public function testInputNested(){
        $this->post('/input/hello/first',[
            'name' => [
                'first' => 'Fredik',
                'last' => 'Stefan'
            ]
            ])->assertSeeText('Hello Fredik');
    }

    public function testInputAll(){
        $this->post('/input/hello/input',[
            'name' => [
                'first' => 'Fredik',
                'last' => 'Stefan'
            ]
            ])->assertSeeText('Fredik')->assertSeeText("Stefan");
    }

    public function testInputArray(){
        $this->post('/input/hello/products',[
            'products'=>[
                [
                    'name' => "Apple Mac Book Pro",
                    "price" => 30000000
                ],
                [
                    "name" => "Samsung Galaxy",
                    'price' => 10000000
                ]
            ]
            ])->assertSeeText('Apple')->assertSeeText("Samsung");
    }


    public function testInputType(){
        $this->post(
            '/input/type',
            [
                'name' => 'Budi',
                'married' => 'true',
                'birth_date' => '1990-10-10'
            ]
        )->assertSeeText('Budi')->assertSeeText('true')->assertSeeText('1990-10-10');
    }
}
