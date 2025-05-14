<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

    public function addUser(Request $req){
       
        $users = DB::table('users')
                    ->insert(
                        [
                            'name' => $req->name,
                            'email' => $req->email,
                            'password' => Hash::make($req->password),
                            'created_at' => now()
                        ]
                        );
                        if($users){
                            return redirect()->route('show.user');
                        }else{
                            echo "Data is not Inserted";
                        }
    }

    public function deleteUser(string $id){
        $users = DB::table('users')->where('id',$id)->delete();
        return redirect()->route('show.user');
    }
}
