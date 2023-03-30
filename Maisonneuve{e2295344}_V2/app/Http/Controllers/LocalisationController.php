<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/* use App; */

class LocalisationController extends Controller
{
        public function index($locale){

       
        session()->put('locale', $locale);
        return redirect()->back();
        }
}
