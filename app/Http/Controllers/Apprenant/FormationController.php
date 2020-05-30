<?php

namespace App\Http\Controllers\Apprenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;


class FormationController extends Controller
{
    public function inscrire($formation){
        Auth::user()->formation()->attach($formation);
        return redirect()->route('getFormation',$formation);

    }


    public function desinscrire($formation){
        Auth::user()->formation()->detach($formation);
        return redirect()->route('getFormation',$formation);
    }




}
