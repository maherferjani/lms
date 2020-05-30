@extends('layouts.master')

@section('content')
<div class="container page__container mt-4">
      <h3 class="page-title mb-4">Take Qcm</h3>

    {!! Form::open(['method' => 'POST', 'route' => ['tests.store']]) !!}
    <input type="hidden" name="qcm_id" value="{{ $uid }}">
    @if(count($questions) > 0)
          <div id="questions_wrapper">
        @foreach($questions as $i=>$question)
          <div class="card mb-4" data-position="1" data-question-id="1">
                        <div class="card-header d-flex justify-content-between">
                            <div class="d-flex align-items-center ">
                                <div class="h4 m-0 ml-4">Question {{ ++$i }} : {!! nl2br($question->question_text) !!}</div>
                                @if ($question->answer_explanation != '')
                                    <div class="code_snippet">{!! $question->answer_explanation !!}</div>
                                @endif
                                <input
                                    type="hidden"
                                    name="questions[{{ $i }}]"
                                    value="{{ $question->id }}">
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="answerWrapper_1">
                                  <ul class="list-group" id="answer_container_1">
                                    @foreach($question->options as $option)
                                        <li class="list-group-item d-flex" data-position="1" data-answer-id="1" data-question-id="1">
                                            <span class="mr-2"><i class="material-icons text-light-gray">menu</i></span>
                                            <div>
                                                {{ $option->option }}
                                            </div>
                                            <div class="ml-auto">
                                                <input
                                                    type="radio"
                                                    name="answers[{{ $question->id }}]"
                                                    value="{{ $option->id }}">
                                            </div>
                                        </li>
                                    @endforeach
                                    </ul>
                            </div>
                        </div>
                    </div>
        @endforeach
        </div>
    @endif

    {!! Form::submit(trans('quickadmin.submit_quiz'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
</div>
@stop
