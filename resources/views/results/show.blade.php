@extends('layouts.master')

@section('content')
<div class="mdk-header-layout__content">
    <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
        <div class="mdk-drawer-layout__content page">
            <div class="container-fluid page__heading-container">
                <div class="page__heading d-flex align-items-center justify-content-between">
                    <h3 class="m-0">Result</h3>
                    <a href="{{ url()->previous()}}" class="btn btn-primary">Back</a>
                </div>
            </div>
            <div class="container-fluid page__container">
                <div class="card">
                  <div class="card-body">
                    <table class="table table-bordered table-striped">
                        @if(Auth::user()->hasRole('admin'))
                        <tr>
                            <th>@lang('quickadmin.results.fields.user')</th>
                            <td>{{ $test->user->name }} ({{ $test->user->email }})</td>
                        </tr>
                        @endif
                        <tr>
                            <th>@lang('quickadmin.results.fields.date')</th>
                            <td>{{ $test->created_at }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.results.fields.result')</th>
                            <td>{{ $test->result }}/100</td>
                        </tr>
                    </table>
                    @foreach($results as $i=>$result)
                        <table class="table table-bordered table-striped">
                            <tr class="test-option{{ $result->correct ? '-true' : '-false' }}">
                                <th style="width: 15%">Question #{{ ++$i }}</th>
                                <th>{{ $result->question->question_text }}</th>
                            </tr>
                            <tr>
                                <td>Options</td>
                                <td>
                                    <ul>
                                    @foreach($result->question->options as $option)
                                        <li style="@if ($option->correct == 1) font-weight: bold; @endif
                                            @if ($result->option_id == $option->id) text-decoration: underline @endif">{{ $option->option }}
                                            @if ($option->correct == 1) <em>(correct answer)</em> @endif
                                            @if ($result->option_id == $option->id) <em>(your answer)</em> @endif
                                        </li>
                                    @endforeach
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td>Answer Explanation</td>
                                <td>
                                  {!! $result->question->answer_explanation  !!}
                                </td>
                            </tr>
                        </table>
                    @endforeach
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
