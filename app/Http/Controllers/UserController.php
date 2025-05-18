<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showUser(){
        $users= DB::table('users')->paginate(3);
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

    public function updateUser(string $id){
        // $users = DB::table('users')->where('id',$id)->get();
        $users = DB::table('users')->find($id);
        return view('admin.updateproduct',compact('users'));
    }

    public function updateSingleUser(Request $req, $id){
        $users = DB::table('users')
        ->where('id',$id)
        ->update(
         [
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password),
         ]);

         if($users){
                            return redirect()->route('show.user');
                        }else{
                            echo "Data Update Failed";
                        }
    }
    
}
