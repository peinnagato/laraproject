<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(int $id){
        return view('index',['id'=>$id]);
    }
}
