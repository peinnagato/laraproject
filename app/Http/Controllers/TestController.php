<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
<<<<<<< HEAD
    public function index(){
        return view('/index');
=======
    public function index(int $id){
        return view('index',['id'=>$id]);
>>>>>>> 21819ef61e552309d4f5d47317d47a8f7e85e65e
    }
}
