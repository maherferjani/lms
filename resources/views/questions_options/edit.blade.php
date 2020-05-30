@extends('layouts.master')

@section('content')
<div class="mdk-header-layout__content">
    <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
        <div class="mdk-drawer-layout__content page">
            <div class="container-fluid page__heading-container">
                <div class="page__heading d-flex align-items-center justify-content-between">
                    <h3 class="m-0">Edit Question Option</h3>
                    <a href="{{ route('questions_options.index')}}" class="btn btn-primary">@lang('quickadmin.back_to_list')</a>
                </div>
            </div>
            <div class="container-fluid page__container">
                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

    {!! Form::model($questions_option, ['method' => 'PUT', 'route' => ['questions_options.update', $questions_option->id]]) !!}
                <div class="col-xs-12 form-group">
                    {!! Form::label('question_id', 'question*', ['class' => 'control-label']) !!}
                    {!! Form::select('question_id', $questions, old('question_id'), ['class' => 'form-control']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('question_id'))
                        <p class="help-block">
                            {{ $errors->first('question_id') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-12 form-group">
                    {!! Form::label('option', 'Option*', ['class' => 'control-label']) !!}
                    {!! Form::text('option', old('option'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('option'))
                        <p class="help-block">
                            {{ $errors->first('option') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-12 form-group">
                    {!! Form::label('correct', 'Correct ?', ['class' => 'control-label']) !!}
                    {!! Form::hidden('correct', 0) !!}
                    {!! Form::checkbox('correct', 1, old('correct', 0), ['class' => 'control-input']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('correct'))
                        <p class="help-block">
                            {{ $errors->first('correct') }}
                        </p>
                    @endif
                </div>
    {!! Form::submit(trans('quickadmin.update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
  </div>
</div>
</div>
</div>
</div>
</div>
@stop
