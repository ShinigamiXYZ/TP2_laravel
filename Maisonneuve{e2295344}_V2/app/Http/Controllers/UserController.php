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
       

  if (Auth::check()) {
    
    session()->forget('user_id');
   
    Auth::logout(); /* Si on retourne a la page de login , ont sort de la session */    
}
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
       
         session(['user_id' => Auth::user()->id]);
    
         return redirect('/forum')->with('success', 'You have been successfully logged in.');
     } else{
     
         return back()->withErrors(['message' => 'Invalid credentials. Please try again.']);
     }

     
    }
}
