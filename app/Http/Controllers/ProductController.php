<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function showproduct()
    {
        $products= DB::table('products')->get();
        // dd($users);
        // foreach($users as $user){
        //     echo $user->name."</br>";
        //     // print_r ($user)."</br>";
            return view('products',compact('products'));
        // }
    }

    public function singleProduct(string $id){
        $products= DB::table('products')->find( $id );
        return view('singleproduct',compact('products'));
    }
}
