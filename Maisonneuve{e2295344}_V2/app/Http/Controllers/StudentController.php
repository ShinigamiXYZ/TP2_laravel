<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Town;

class StudentController extends Controller
{

    public function index()
    {
        // Récupérer tous les élèves
        $student = Student::all();
        // Paginer les résultats récupérés, avec 15 enregistrements par page
        $student = Student::simplePaginate(15); 
        // Retourner la vue 'main.index' en passant la liste des étudiants récupérés
        return view('main.index', ['studentList' => $student]);
    }

    public function create(){
        // Récupérer toutes les villes
        $towns = Town::all();
        // Retourner la vue 'main.create' en passant la liste des villes récupérées
        return view('main.create', ['towns' => $towns]);
    }

    public function store(Request $request)
    {
        // Récupérer les données soumises par l'utilisateur pour les champs spécifiés
        $data = $request->only(['name', 'address', 'phone', 'email', 'year_of_birth', 'town_id']);
        // Définir les règles de validation à appliquer
        $validations = [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:60',
            'email' => 'required|string|email|max:255|unique:students',
            'year_of_birth' => 'required|integer|between:1900,2023'
        ];
        // Définir les messages d'erreur personnalisés
        // Si aucun changements -> validation preetablis dans lang/en/validation
        $messages = [
            'year_of_birth.between' => 'vous êtes soit mort, soit pas encore né.'
        ];
        // Valider les données soumises en utilisant les règles de validation et les messages d'erreur définis précédemment.
        $validatedData = $request->validate($validations, $messages);
        // Créer un nouvel étudiant avec les données validées
        $student = Student::create($data);
        // Rediriger vers la page de visualisation de l'étudiant avec un message de succès
        return redirect(route('main.show', $student->id))->withSuccess('Étudiant créé avec succès.'); 
    }

    public function show($studentId)
    {
        // Récupérer tous les villes
        $towns = Town::all();
        // Récupérer l'étudiant avec l'id spécifié
        $student = Student::findOrFail($studentId);
        // Retourner la vue 'main.show' en passant l'étudiant récupéré et la liste des villes
        return view('main.show', compact('student', 'towns')); // == ['student' => $student]); Si on veut que la clé soit identique à la variable, compact est une variation
    }

    public function edit($studentId)
    {
        // Récupérer toutes les villes
        $towns = Town::all();
        // Récupérer l'étudiant avec l'id spécifié
        $student = Student::findOrFail($studentId); 
        // Retourner la vue 'main.edit' en passant l'étudiant récupéré et la liste des villes
        return view('main.edit', compact('student', 'towns')); // == ['student' => $student]); Si on veut que la clé soit identique à la variable, compact est une variation
    }

    public function update(Request $request)
    {   
        // Récupérer l'étudiant avec l'id spécifié
        $student = Student::findOrFail($request->id);     
        // Mettre à jour les informations de l'étudiant avec les données soumises par l'utilisateur
        $student->update($request->only(['name', 'address' , 'phone', 'email', 'year_of_birth', 'town_id']));
        // Rediriger vers la page de visualisation de l'étudiant avec un message de succès
        return redirect(route('main.show', $request->id))->withSuccess('Informations mises à jour.');
    }

    public function destroy(Request $request)
    {   
        // Récupérer l'étudiant avec l'id spécifié
        $student = Student::find($request->id);      
        // Supprimer l'étudiant avec l'id spécifié
        $student::destroy([$request->id]);    
        // Rediriger vers la page d'accueil avec un message de succès  
        return redirect(route('main.index'))->withSuccess('Utilisateur supprimé.');
    }
}