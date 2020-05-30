<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Formation;
use Auth;

class BaseController extends Controller
{
    public function index(){
        return view('index')->with('formations', Formation::latest()->take(4)->get());
    }


    public function getFormation($id){
        $formation = Formation::findOrFail($id);
        if(Auth::user()->formation()->where('id', $formation->id)->exists())
            return redirect()->route('getCourse', ['id' => $formation->id, 'course' => $formation->cours->first()->id]);
        else
            return view('formation')->with('formation', Formation::findOrFail($id));
    }


    public function profile(){
        $formations = Auth::user()->formation;
        return view('profile')->with('formations', $formations);
    }
}
