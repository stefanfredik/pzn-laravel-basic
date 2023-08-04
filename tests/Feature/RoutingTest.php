<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutingTest extends TestCase
{
   public function testGet(){
    $this->get('/kflores')
        ->assertStatus(200)
        ->assertSeeText("Hello Kopi FLores");
   }

   public function testRedirect(){
      $this->get('/youtube')
         ->assertRedirect('/kflores');
   }

   public function testTemplate(){
      $this->view('hello',['name'=>'Fredik'])->assertSeeText("Hello Fredik");
      $this->view("hello.world",['name'=> "Fredik"])->assertSeeText("Fredik");
   }

   public function testRoutePramater(){
      $this->get("/products/1")->assertSeeText("Product 1");
      $this->get("/products/1/items/YYY")->assertSeeText("Product 1, Item YYY");
   }


   public function testRouteParameterRegex(){
      $this->get('/categories/100')->assertSeeText("Category 100");
      $this->get('/categories/fredik')->assertSeeText("404");
   }


   public function testRouterParameterOptional(){
      $this->get('/users/fredikstefan')->assertSeeText("User fredikstefan");
      $this->get("/users/")->assertSeeText("User 404");
   }


   // routing conflict test
   public function testROuteCOnflict(){
      $this->get('/conflict/budi')->assertSeeText("Conflict budi");
      $this->get("/conflict/fredik")->assertSeeText("Conflict Fredik Stefan");
   }

   public function testNamedRoute(){
      $this->get('/produk/12345')->assertSeeText("Link http://localhost/products/12345");

      $this->get("/produk-redirect/12345")->assertRedirect("/products/12345");
   }
}
