<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Town;
use App\Models\Users;

class UserController extends Controller
{
    public function login(){
       

        return view('auth.login');
    }
    public function register(){
        $students= Student::all();

        return view('auth.register', ['students'=>$students]);
    }

    public function createAccount(Request $request){
        $data = $request->only(['fullname', 'username', 'password', 'password_confirmation']);
        dd($data);
    }
}
