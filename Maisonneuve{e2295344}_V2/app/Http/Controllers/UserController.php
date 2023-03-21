<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Town;
use App\Models\User;

class UserController extends Controller
{

    /* Un user se doit d'etre etudiant mais un etudiant n'est pas forcément un utilisateurs */
    public function login(){
       

        return view('auth.login');
    }
    public function register(){
        $students= Student::all();

        return view('auth.register', ['students'=>$students]);
    }

    public function createAccount(Request $request){
        $data = $request->only(['fullname', 'username', 'password', 'password_confirmation']);

        $validations = [
            'fullname' => 'required',
            'username' => 'required|alpha_num|min:5|max:20',
            'password' => 'required|min:8|max:25|confirmed|' /* valide que les deux inputs sont identiques */
            
        ];

        $validatedData = $request->validate($validations);

        $data['password'] = Hash::make($data['password']); /* Hashing  */
        $user = User::create($data);/* Creation user */


         // Associer user avec l'etudiant
        $student = Student::find($data['fullname']);
        $student->user()->associate($user);
        $student->save();

        return redirect(route('auth.login'))->withSuccess('Account created successfully.'); 

       
    }


    public function auth(Request $request){
        $data = $request->only(['username', 'password']);
     

        if(Auth::attempt($data)){ /* Methode facade Auth */
         
            /* dd('passed'); */
        }
        else{
         
           /*  dd('failed'); */
        };


     
    }
}
