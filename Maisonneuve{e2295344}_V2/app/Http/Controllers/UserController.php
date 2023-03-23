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
    /* Un utilisateur doit être un étudiant, mais un étudiant n'est pas forcément un utilisateur */

    public function login(){
    //fonction de connexion de l'utilisateur
        if (Auth::check()) {
            session()->forget('user_id');
            Auth::logout(); /* Si on retourne a la page de login, on sort de la session */    
        }
        return view('auth.login');
    }

    public function register(){
    //fonction d'enregistrement de l'utilisateur
        $students= Student::all();
        return view('auth.register', ['students'=>$students]);
    }

    public function createAccount(Request $request){
    //créer un compte utilisateur et l'associer à un étudiant
        $data = $request->only(['fullname', 'username', 'password', 'password_confirmation']);

        $validations = [
            'fullname' => 'required',
            'username' => 'required|alpha_num|min:5|max:20',
            'password' => 'required|min:8|max:25|confirmed|' /* valide que les deux inputs sont identiques */   
        ];

    //validation des données saisies

        $validatedData = $request->validate($validations);

    //hashage du mot de passe avant de le stocker dans la base de données

        $data['password'] = Hash::make($data['password']);

    // création de l'utilisateur

        $user = User::create($data);

         // Associer user avec l'etudiant

        $student = Student::find($data['fullname']);
        $student->user()->associate($user);
        $student->save();

    // redirection vers la page de connexion

        return redirect(route('auth.login'))->withSuccess(trans('base.creation_success'));

       
    }


    public function auth(Request $request){
    //authentification de l'utilisateur
        $data = $request->only(['username', 'password']);

        if(Auth::attempt($data)){ /* Methode facade Auth */
       
         session(['user_id' => Auth::user()->id]);
    
         return redirect('/forum')->withSuccess(trans('auth.success'));
     } else{
     
         return back()->withErrors(trans('auth.failed'));
     }

     
    }
}
