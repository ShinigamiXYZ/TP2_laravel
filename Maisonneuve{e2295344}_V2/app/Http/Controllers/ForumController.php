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
        
        if (app()->getLocale() == 'fr') {
            $request->validate([
                'fr_title' => 'required_with:fr_content|string|max:30',
                'fr_content' => 'required_with:fr_title|string|max:250',
                'en_title' => 'nullable|string|max:30',
                'en_content' => 'nullable|string|max:250',
            ]);
        } elseif (app()->getLocale() == 'en') {
            $request->validate([
                'en_title' => 'required_with:en_content|string|max:30',
                'en_content' => 'required_with:en_title|string|max:250',
                'fr_title' => 'nullable|string|max:30',
                'fr_content' => 'nullable|string|max:250',
            ]);
        }

        /*  Set de validation spécifique au language sélectioner */

        
  
        //Créer un nouveau post dans le forum avec les données récupérées
        $forum = Forum::create($forumData);

        //Rediriger vers la page principale du forum 
        return redirect()->route('forum.index');
    }

    public function update(Request $request, $id)
    {

     
        $forum = Forum::find($id);  

        if (app()->getLocale() == 'fr') {
            $request->validate([
                'fr_title' => 'required_with:fr_content|string|max:30',
                'fr_content' => 'required_with:fr_title|string|max:250',
                'en_title' => 'nullable|string|max:30',
                'en_content' => 'nullable|string|max:250',
            ]);
        } elseif (app()->getLocale() == 'en') {
            $request->validate([
                'en_title' => 'required_with:en_content|string|max:30',
                'en_content' => 'required_with:en_title|string|max:250',
                'fr_title' => 'nullable|string|max:30',
                'fr_content' => 'nullable|string|max:250',
            ]);
        }

        /* variation de la validation basé sur le langage local demandé par l'utilisateurs */
        /* si fr seuleemnt la section fr est requise et liaison de titre et content */
        /* contraire si anglais */
        
        $forumData =$request->only('fr_title', 'fr_content', 'en_title','en_content');
     
        $forum->update($forumData);
        
         return redirect()->route('forum.index');


    }




    public function show($id){

        $post = Forum::find($id);

        //Renvoyer la vue 'forum.show' avec le post et les commentaires récupérés
        return view('forum.show', ['post' => $post]);
    }
    
    public function destroy($id)
    {

        //Récupérer le post avec l'id récupéré
        $post = Forum::find($id);

        //Supprimer le post récupéré
        $post->delete();

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
