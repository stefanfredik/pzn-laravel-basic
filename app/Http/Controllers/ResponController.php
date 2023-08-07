<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;

class ResponController extends Controller
{
    public function response(Request $request): Response
    {
        return  response("hello response");
    }
}
