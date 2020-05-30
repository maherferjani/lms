<?php

namespace App\Http\Controllers\Formateur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Formation;
use Auth;
use App\Cour;
use App\Comment;

class CourController extends Controller
{
    public function index(){
        return view('formateur.cours.index')->with('cours', Cour::all());
    }


    public function show($id){
        
        return view('formateur.cours.show')->with('commentaires', Comment::where('cour_id','=', $id)->where('reponse','=','')->get());
    }


    public function create(){
        return view('formateur.cours.create')->with('formations', Formation::all());
    }

    public function store(Request $request){

        $request->validate([
            'titre' => 'required|alpha_dash',
            'description' => 'required|alpha_num',
            'ordre' => 'required|numeric|min:1',
            'video' => 'required|mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi'
        ]);

        $cour = new Cour();
        $cour->titre = $request->input('titre');
        $cour->description = $request->input('description');
        $cour->ordre = $request->input('ordre');
        $cour->formation_id = $request->input('formation');
        $imageName = time().'.'.$request->video->extension();  
        $request->video->move(public_path('videos'), $imageName);
        $cour->file = $imageName;
        $cour->save();


    }


    public function edit($id){
            return view('formateur.cours.edit')->with('cour', Cour::findOrFail($id))->with('formations', Formation::all());
    }


    public function update(Request $request, $id){
        $request->validate([
            'titre' => 'required|alpha_dash',
            'description' => 'required|alpha_num',
            'ordre' => 'required|numeric|min:1',
            'video' => 'sometimes|mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi'
        ]);

        $cour = Cour::findOrFail($id);

        if($request->input('video')){
            $imageName = time().'.'.$request->video->extension();  
            $request->video->move(public_path('videos'), $imageName);
            $cour->file = $imageName;
        }

        $cour->titre = $request->input('titre');
        $cour->description = $request->input('description');
        $cour->ordre = $request->input('ordre');
        $cour->formation_id = $request->input('formation');
        $cour->save();
    }


    public function destroy($id){
        Cour::findOrFail($id)->delete();
    }

    public function publier(Request $request, $id){
        //ddd($request->input());
        $commentaire = Comment::findOrFail($id);
        $commentaire->reponse = $request->input('reponse');
        $commentaire->save();
        return redirect()->back();
    }


    public function supprimer($id){
        Comment::findOrFail($id)->delete();
        return redirect()->back();
    }
}
