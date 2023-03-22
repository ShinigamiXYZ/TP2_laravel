<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Forum;


class ForumController extends Controller
{
    public function index(){
        return view('forum.index');
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
