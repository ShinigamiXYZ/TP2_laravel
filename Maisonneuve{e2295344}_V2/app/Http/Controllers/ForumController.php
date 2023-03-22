<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Models\Student;

use App\Models\Forum;

class ForumController extends Controller
{
    public function index()
    {
            //Récupérer tous les posts du forum
            $posts = Forum::all();

            //Paginer les résultats récupérés, avec 15 enregistrements par page
            $posts= Forum::simplePaginate(15);

            //Renvoyer la vue 'forum.index' avec la liste des posts récupérés
            return view('forum.index', ['postlists' => $posts]);
    }

    public function create()
    {
        //Renvoyer la vue 'forum.create' pour créer un nouveau post dans le forum
        return view('forum.create');
    }

    public function store(Request $request)
    {
        //Récupérer l'utilisateur connecté
        $user = Auth::user();
  
        //Créer un tableau forumData avec les champs 'title' et 'content' et ajouter le champ 'user_id' avec l'id de l'utilisateur connecté
        $forumData = array_merge($request->only('title', 'content'), ['user_id' => $user->id]);
  
        //Créer un nouveau post dans le forum avec les données récupérées
        $forum = Forum::create($forumData);

        //Rediriger vers la page principale du forum 
        return redirect()->route('forum.index');
    }
}
