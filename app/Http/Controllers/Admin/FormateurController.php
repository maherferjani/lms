<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class FormateurController extends Controller
{
    public function index(){
        return view('admin.formateur.index')->with('formateurs', User::where('role','=','1')->get());
    }


    public function edit(){
        return view('aadmin.formateur.edit');
        //TODO
    }

    public function update(){
        //TODO
    }

    public function destroy($id){
        User::findOrFail($id)->delete();
    }


}
