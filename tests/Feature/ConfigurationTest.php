<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConfigurationTest extends TestCase
{    
    public function testConfig(){
        $firstName = config("contoh.author.firstname");
        $lastName = config("contoh.author.lastname");
        $email = config("contoh.email");
        $web = config("contoh.web");

        self::assertEquals("Fredik",$firstName);
        self::assertEquals("Stefan",$lastName);
        self::assertEquals("stefanfredik@gmail.com",$email);
        self::assertEquals("http://fredikstefan.com",$web);
     }
}
