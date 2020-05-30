<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Categeory;
use Illuminate\Http\Request;

class CategeoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return "hello";
        return view('admin.categories.index')->with('categories', Categeory::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|alpha_dash|max:50'
        ]);

        $category = new Categeory();
        $category->nom = $request->input('nom');
        $category->save();
        return redirect()->route('categorie.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categeory  $categeory
     * @return \Illuminate\Http\Response
     */
    public function show(Categeory $categeory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categeory  $categeory
     * @return \Illuminate\Http\Response
     */
    public function edit($categeory)
    {   $cat = Categeory::findOrFail($categeory);
        return view('admin.categories.edit')->with('categorie', $cat);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categeory  $categeory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $categeory)
    {
        $request->validate([
            'nom' => 'required|alpha_dash|max:50'
        ]);
        $cat = Categeory::findOrFail($categeory);
        $cat->nom = $request->input('nom');
        $cat->update();
        return redirect()->route('categorie.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categeory  $categeory
     * @return \Illuminate\Http\Response
     */
    public function destroy( $categeory)
    {
        $cat = Categeory::findOrFail($categeory)->delete();
        return redirect()->route('categorie.index');

    }
}
