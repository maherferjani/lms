<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Formation;
use App\Cour;
use App\Comment;
class CourController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function getCourse($formation, $cour){
        $formation = Formation::findOrFail($formation);
        //return $formation->qcm[0];
        $lesson = Cour::findOrFail($cour);
        $next = null;
        if(!Auth::user()->formation->contains($formation)){
            //return abort(404);
            return redirect()->route('getFormation',[$formation]);
            //return abort( response('Please subscribe to the formation at first', 401) );
        }
        if (!$formation->cours->contains($cour)){
          return redirect()->route('getFormation',[$formation]);
          //return abort(404);
          //return abort( response('Please subscribe to the formation at first', 401) );
         }
        foreach($formation->cours as $key=>$c){
             if($c->id === $lesson->id && (($key+1) !== (count($formation->cours))))
               $next =  $formation->cours[$key+1]->id;
         }
        return view('courses')->with('formation', $formation)->with('lesson', $lesson)->with('next', $next);
    }

    public function complete(Request $request, $id){
        $cour = Cour::findOrFail($id);
        $formation = Auth::user()->formation()->where('id',$cour->formation->id)->first();
        if(Auth::user()->cours->contains($cour))
            abort(404);

        Auth::user()->cours()->attach($id);

        if($request->input('next') )
            return redirect()->route('getCourse', ['id'=>$formation->id, 'course'=>$request->input('next')]);
        return redirect()->back();
    }

    public function publierCommentaire(Request $request, $id){
        $commentaire = new Comment();
        $commentaire->user_id = Auth::user()->id;
        $commentaire->cour_id = $id;
        $commentaire->commentaire = $request->input('commentaire');
        $commentaire->save();
        return redirect()->back();

    }
}
