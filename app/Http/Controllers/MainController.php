<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        return view('index');
    }

    public function product(int $id){
        // echo $id;
        return view('contact',compact('id'));
    }

    public function addProductController(){
        echo "Hello";
    }
}
