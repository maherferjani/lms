<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Formation;
use App\Cour;

class CourController extends Controller
{
    public function index(){
        return view('admin.cours.index')->with('cours', Cour::all());
    }


    public function show(){

    }

    public function create(){
        return view('admin.cours.create')->with('formations', Formation::all());
    }

    public function store(Request $request){

        $request->validate([
            'titre' => 'required',
            'description' => 'required',
            'ordre' => 'required|numeric|min:1',
            'video' => 'required|mimetypes:application/pdf,image/jpeg,image/png,image/jpg,image/gif,image/svg,video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi'
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
        return redirect()->route('cour.index');

    }


    public function edit($id){
            return view('admin.cours.edit')->with('cour', Cour::findOrFail($id))->with('formations', Formation::all());
    }


    public function update(Request $request, $id){
        $request->validate([
            'titre' => 'required',
            'description' => 'required',
            'ordre' => 'required|numeric|min:1',
            'video' => 'sometimes|mimetypes:application/pdf,image/jpeg,image/png,image/jpg,image/gif,image/svg,video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi'
        ]);

        $cour = Cour::findOrFail($id);

        if($request->video){
            $imageName = time().'.'.$request->video->extension();
            $request->video->move(public_path('videos'), $imageName);
            $cour->file = $imageName;
        }

        $cour->titre = $request->input('titre');
        $cour->description = $request->input('description');
        $cour->ordre = $request->input('ordre');
        $cour->formation_id = $request->input('formation');
        $cour->save();
        return redirect()->route('cour.index');
    }


    public function destroy($id){
        Cour::findOrFail($id)->delete();
        return redirect()->route('cour.index');
    }
}
