<?php

namespace App\Http\Controllers\Qcm;
use App\Http\Controllers\Controller;

use Auth;
use App\Test;
use App\Reponse;
use Illuminate\Http\Request;

class ResultsController extends Controller
{
    public function __construct()
    {
        //$this->middleware('admin')->except('index', 'show');
    }

    /**
     * Display a listing of Result.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Test::all();
        return view('results.index', compact('results'));
    }
    /**
     * Display a listing of Result.
     *
     * @return \Illuminate\Http\Response
     */
    public function myresults()
    {
        $results = Test::all()->load('user');
        $results = $results->where('user_id', '=', Auth::id());
        return view('results.myindex', compact('results'));
    }

    /**
     * Display Result.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $test = Test::find($id)->load('user');

        if ($test) {
            $results = Reponse::where('test_id', $id)
                ->with('question')
                ->with('question.options')
                ->get()
            ;
        }

        return view('results.show', compact('test', 'results'));
    }
    /**
     * Display Result.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function myresultshow($id)
    {
        $test = Test::find($id)->load('user');

        if ($test) {
            $results = Reponse::where('test_id', $id)
                ->with('question')
                ->with('question.options')
                ->get()
            ;
        }

        return view('results.myshow', compact('test', 'results'));
    }
}
