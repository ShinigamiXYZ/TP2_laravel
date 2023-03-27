<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;


use App\Models\Student;
use App\Models\Forum;
use App\Models\Comment;

class ForumController extends Controller
{
    public function index()

    {
          //Récupérer tous les étudiants
            $studentlist = Student::All();

          $posts = Forum::with('comments');
            //Récupérer tous les posts du forum avec les commentaires associées
            $posts = Forum::with('comments');

            //Paginer les résultats récupérés, avec 3 enregistrements par page
            $posts= Forum::simplePaginate(3);

            //Renvoyer la vue 'forum.index' avec la liste des posts récupérés
            return view('forum.index', ['postlists' => $posts, 'students'=>$studentlist]);
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
        $forumData = array_merge($request->only('fr_title', 'fr_content', 'en_title','en_content'), ['user_id' => $user->id]);
        
       
  
        //Créer un nouveau post dans le forum avec les données récupérées
        $forum = Forum::create($forumData);

        //Rediriger vers la page principale du forum 
        return redirect()->route('forum.index');
    }


    public function addcomment(Request $request)
    {
        $request->validate([
            'forum_id' => 'required|exists:forums,id',
            'content' => 'required',
        ]);

        // Assuming the user is logged in and user_id is available
        $user_id = auth()->user()->id;

        Comment::create([
            'forum_id' => $request->forum_id,
            'user_id' => $user_id,
            'content' => $request->content,
        ]);
        
        return redirect()->back()->with('success', 'Comment added successfully!');
}

}
