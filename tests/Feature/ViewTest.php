<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewTest extends TestCase
{
   public function testView(){
    $this->get('/hello')->assertSeeText('Hello Fredik');
    $this->get('/hello-again')->assertSeeText('Hello Fredik');

   }
}
