<?php
namespace App\Http\Controllers\Qcm;
use App\Http\Controllers\Controller;


use DB;
use Auth;
use App\Test;
use App\Reponse;
use App\Qcm;
use App\Question;
use App\QuestionsOption;
use App\Formation;
use Illuminate\Http\Request;
class TestsController extends Controller
{
    /**
     * Display a new test.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
      //$id = 1;
      $k = false;
      $qcm = Qcm::with('questions')->find(Formation::find($id)->qcm[0]->id);
      $test = Test::where([['user_id', '=', Auth::user()->id],['qcm_id', '=', $id]])->get();
      if ($test->count() > 0) {
        $k = true;
        $test = $test[0];
          $results = Reponse::where('test_id', $test->$id)
              ->with('question')
              ->with('question.options')
              ->get()
          ;
      }
      //return $qcm->questions;
      $questions = $qcm->questions;
      $uid = $qcm->id;
      foreach ($questions as &$question) {
          $question->options = QuestionsOption::where('question_id', $question->id)->inRandomOrder()->get();
      }
      return $k ? view('results.myshow', compact('test', 'results')) : view('tests.create', compact(['questions','uid']));
    }

    /**
     * Store a newly solved Test in storage with results.
     *
     * @param  \App\Http\Requests\StoreResultsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = 0;
        $test = Test::create([
            'user_id' => Auth::id(),
            'qcm_id' => $request->input('qcm_id'),
            'result'  => $result,
        ]);

        foreach ($request->input('questions', []) as $key => $question) {
            $status = 0;

            if ($request->input('answers.'.$question) != null
                && QuestionsOption::find($request->input('answers.'.$question))->correct
            ) {
                $status = 1;
                $result++;
            }
            Reponse::create([
                'user_id'     => Auth::id(),
                'test_id'     => $test->id,
                'question_id' => $question,
                'option_id'   => $request->input('answers.'.$question),
                'correct'     => $status,
            ]);
        }
        $result = $result*100/count($request->input('questions', []));
        $test->update(['result' => round($result, 2)]);

        return redirect()->route('myresultshow', [$test->id]);
    }
}
