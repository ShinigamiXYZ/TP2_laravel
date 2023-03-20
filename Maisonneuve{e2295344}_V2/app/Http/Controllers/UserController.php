<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
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
            'username' => 'required',
            'password' => 'required|confirmed' /* valide que les deux inputs sont identiques */
            
        ];

        $validatedData = $request->validate($validations);

        $data['password'] = Hash::make($data['password']); /* Hashing  */
        $user = User::create($data);/* Creation user */


         // Associer user avec l'etudiant
        $student = Student::find($data['fullname']);
        $student->user()->associate($user);
        $student->save();

       
    }
}
