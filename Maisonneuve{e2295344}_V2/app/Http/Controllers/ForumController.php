<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;


class ForumController extends Controller
{
    public function index(){
        return view('forum.index');
    }

    public function create(){
        return view('forum.create');
    }

    public function store(Request $request){
        dd($request->only('title', 'content'));
    }
}
