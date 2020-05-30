@extends('layouts.master')

@section('content')
    <div class="mdk-header-layout__content">

        <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
            <div class="mdk-drawer-layout__content page">


                <div class="container-fluid page__heading-container">
                    <div class="page__heading d-flex align-items-center justify-content-between">
                        <h3 class="m-0">Questions Options Liste</h3>
                        <a href="{{ route('questions_options.create')}}" class="btn btn-primary">Ajouter</a>
                    </div>
                </div>




                <div class="container-fluid page__container">
                    <div class="card">
                <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="text-align:center;">#</th>
                        <th>@lang('quickadmin.questions-options.fields.question')</th>
                        <th>@lang('quickadmin.questions-options.fields.option')</th>
                        <th>@lang('quickadmin.questions-options.fields.correct')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @if (count($questions_options) > 0)
                        @foreach ($questions_options as $questions_option)
                            <tr data-entry-id="{{ $questions_option->id }}">
                                <td>{{ $questions_option->id }}</td>
                                <td>{{ $questions_option->question->question_text}}</td>
                                <td>{{ $questions_option->option }}</td>
                                <td>{{ $questions_option->correct == 1 ? 'Yes' : 'No' }}</td>
                                <td>
                                    <a href="{{ route('questions_options.show',[$questions_option->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.view')</a>
                                    <a href="{{ route('questions_options.edit',[$questions_option->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.edit')</a>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.are_you_sure")."');",
                                        'route' => ['questions_options.destroy', $questions_option->id])) !!}
                                    {!! Form::submit(trans('quickadmin.delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">@lang('quickadmin.no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
              </table>

        </div>
    </div>

    </div>
    </div>
    </div>
@stop
