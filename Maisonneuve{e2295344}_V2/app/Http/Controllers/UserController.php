<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Town;

class UserController extends Controller
{
    public function login(){
       

        return view('auth.login');
    }
    public function register(){
        $students= Student::all();

        return view('auth.register', ['students'=>$students]);
    }

    public function createAccount(){
        dd('created');
    }
}
