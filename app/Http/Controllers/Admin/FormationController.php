<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Formation;
use App\Categeory;
use Auth;

class FormationController extends Controller
{
    public function index(){
        return view('admin.formations.index')->with('formations', Formation::all());
    }
    public function participants($id){
        return view('admin.formations.participants')->with('users', Formation::findOrFail($id)->apprenants)->with('formation', Formation::findOrFail($id));
    }
    public function create(){
        return view('admin.formations.create')->with('categories', Categeory::all());
    }

    public function store(Request $request){


        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'prix' => 'required|numeric|min:0',
            'image' => 'required|mimes:jpeg,bmp,png,jpg'
        ]);

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $formation = new Formation();
            $formation->nom = $request->input('nom');
            $formation->description  = $request->input('description');
            $formation->formateur_id = Auth::user()->id;
            $formation->prix = $request->input('prix');
            $formation->category_id = $request->input('categorie');
            $formation->image = $imageName;
            if($request->input('etat')){
                $formation->etat = "1";
            }else{
                $formation->etat= "0";
            }
            $formation->save();
            return redirect()->route('formation.index');
    }

    public function edit($formation){
            return view('admin.formations.edit')->with('formation', Formation::findOrFail($formation))->with('categories', Categeory::all());
    }

    public function update(Request $request, $id){
        $request->validate([
            'nom' => 'required|alpha_dash',
            'description' => 'required|alpha_num',
            'prix' => 'required|numeric|min:0',
            'image' => 'sometimes|mimes:jpeg,bmp,png,jpg'
        ]);

        $formation = Formation::findOrFail($id);
        if($request->input('image')){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $formation->image = $imageName;
        }


        $formation->nom = $request->input('nom');
        $formation->description  = $request->input('description');
        $formation->formateur_id = Auth::user()->id;
        $formation->prix = $request->input('prix');
        $formation->category_id = $request->input('categorie');
        $formation->image = "placeholder";
        if($request->input('etat')){
            $formation->etat = "1";
        }else{
            $formation->etat= "0";
        }
        $formation->update();
        return redirect()->route('formation.index');

    }

    public function destroy($id){
        $formation = Formation::findOrFail($id)->delete();
        return redirect()->route('formation.index');

    }


}
