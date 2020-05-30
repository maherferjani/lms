<?php

namespace App\Http\Controllers\Qcm;
use App\Http\Controllers\Controller;

use App\Qcm;
use App\Formation;
use Illuminate\Http\Request;

class QcmsController extends Controller
{
    public function __construct()
    {
      
    }

    /**
     * Display a listing of Qcm.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $qcms = Qcm::all();

        return view('qcms.index', compact('qcms'));
    }

    /**
     * Show the form for creating new qcm.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('qcms.create')->with('formations', Formation::all());
    }

    /**
     * Store a newly created Qcm in storage.
     *
     * @param  \App\Http\Requests\StoreQcmsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
          'title' => 'required',
          'formation_id' => 'required',
      ]);
      $qcm = new Qcm();
      $qcm->title = $request->input('title');
      $qcm->formation_id = $request->input('formation_id');
      $qcm->save();
      return redirect()->route('qcms.index');
    }


    /**
     * Show the form for editing Qcm.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $qcm = Qcm::findOrFail($id);

        return view('qcms.edit', compact('qcm'));
    }

    /**
     * Update Qcm in storage.
     *
     * @param  \App\Http\Requests\UpdateQcmsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $qcm = Qcm::findOrFail($id);
        $qcm->update($request->all());

        return redirect()->route('qcms.index');
    }


    /**
     * Display Qcm.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $qcm = Qcm::findOrFail($id);

        return view('qcms.show', compact('qcm'));
    }


    /**
     * Remove Qcm from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $qcm = Qcm::findOrFail($id);
        $qcm->delete();

        return redirect()->route('qcms.index');
    }

    /**
     * Delete all selected qcm at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Qcm::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
