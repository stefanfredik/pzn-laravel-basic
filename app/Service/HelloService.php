<?php 

namespace App\Service;

interface HelloService{
    public function hello(String $name): string;
}