<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function showUser(){
        $users= DB::table('users')->get();
        // dd($users);
        // foreach($users as $user){
        //     echo $user->name."</br>";
        //     // print_r ($user)."</br>";
            return view('admin.table',compact('users'));
        // }
    }

    public function singleUser(string $id){
        $users = DB::table('users')->where('id',$id)->get();
        print_r($users)."</n>";
    }
}
