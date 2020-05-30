@extends('layouts.master')

@section('content')
<div class="mdk-header-layout__content">
    <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
        <div class="mdk-drawer-layout__content page">
            <div class="container-fluid page__heading-container">
                <div class="page__heading d-flex align-items-center justify-content-between">
                    <h3 class="m-0">Question Option Details</h3>
                    <a href="{{ route('questions_options.index')}}" class="btn btn-primary">@lang('quickadmin.back_to_list')</a>
                </div>
            </div>
            <div class="container-fluid page__container">
                <div class="card">
                    <table class="table table-bordered">
                        <tr>
                          <th>@lang('quickadmin.questions-options.fields.question')</th>
                          <td>{{ $questions_option->question->question_text }}</td>
                        </tr>
                        <tr>
                          <th>@lang('quickadmin.questions-options.fields.option')</th>
                          <td>{{ $questions_option->option }}</td>
                        </tr>
                        <tr>
                          <th>@lang('quickadmin.questions-options.fields.correct')</th>
                          <td>{{ $questions_option->correct == 1 ? 'Yes' : 'No' }}</td>
                        </tr>
                    </table></div>
                </div>

            </div>
          </div>
          </div>
@stop
