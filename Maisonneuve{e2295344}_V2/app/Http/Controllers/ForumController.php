<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Forum;


class ForumController extends Controller
{
    public function index(){
        $posts = Forum::all();
        $posts= Forum::simplePaginate(15);  // Paginer les résultats récupérés, avec 15 enregistrements par page
        return view('forum.index', ['postlists' => $posts]);
    }

    public function create(){
        return view('forum.create');
    }

    public function store(Request $request){
    
    $user = Auth::user();

      
    $forumData = array_merge($request->only('title', 'content'), ['user_id' => $user->id]);
   
 
    $forum = Forum::create($forumData);


    return redirect()->route('forum.index');
    }
}
