<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use mysql_xdevapi\Exception;
use Illuminate\Support\Facades\Hash;


class UserControler extends Controller
{
    function login(Request $req){
        $user = User::where(['email'=>$req->email])->first();
        if(!$user || !Hash::check($req->password, $user->password)){
            return "Username or password is incorrect";
        }
        else{
            $req->session()->put('user', $user);
            return redirect('/');
        }
    }
}
