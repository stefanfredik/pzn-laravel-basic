<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Env;
use Tests\TestCase;

class EnvironmentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

     public function testGetEnv(){
        $youtube = env("NAME");


        self::assertEquals('Fredik Stefan',$youtube);
     }


     public function testDefaultEnv(){
        $author = Env::get("AUTHOR","FREDIK STEFAN");

        self::assertEquals('FREDIK STEFAN',$author);
     }
}
