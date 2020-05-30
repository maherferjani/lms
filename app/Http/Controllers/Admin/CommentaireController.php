<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comment;

class CommentaireController extends Controller
{
    //
    public function index(){
        return view('comments')->with('comments', Comment::all());
    }
    public function destroy($id){
        Comment::findOrFail($id)->delete();
        return redirect()->route('comments.index');
    }
}
