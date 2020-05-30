@extends('layouts.master')

@section('content')
<div class="mdk-header-layout__content">
    <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
        <div class="mdk-drawer-layout__content page">
            <div class="container-fluid page__heading-container">
                <div class="page__heading d-flex align-items-center justify-content-between">
                    <h3 class="m-0">Create question</h3>
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
    {!! Form::open(['method' => 'POST', 'route' => ['questions.store']]) !!}
    <div class="col-xs-12 form-group">
                    {!! Form::label('qcm_id', 'qcm*', ['class' => 'control-label']) !!}
                    {!! Form::select('qcm_id', $qcms, old('qcm_id'), ['class' => 'form-control']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('qcm_id'))
                        <p class="help-block">
                            {{ $errors->first('qcm_id') }}
                        </p>
                    @endif
                </div>
    <div class="col-xs-12 form-group">
                    {!! Form::label('question_text', 'Question text*', ['class' => 'control-label']) !!}
                    {!! Form::textarea('question_text', old('question_text'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('question_text'))
                        <p class="help-block">
                            {{ $errors->first('question_text') }}
                        </p>
                    @endif
                </div>
    <div class="col-xs-12 form-group">
        {!! Form::label('option1', 'Option #1', ['class' => 'control-label']) !!}
        {!! Form::text('option1', old('option1'), ['class' => 'form-control ', 'placeholder' => '']) !!}
        <p class="help-block"></p>
        @if($errors->has('option1'))
            <p class="help-block">
                {{ $errors->first('option1') }}
            </p>
        @endif
    </div>
    <div class="col-xs-12 form-group">
        {!! Form::label('option2', 'Option #2', ['class' => 'control-label']) !!}
        {!! Form::text('option2', old('option2'), ['class' => 'form-control ', 'placeholder' => '']) !!}
        <p class="help-block"></p>
        @if($errors->has('option2'))
            <p class="help-block">
                {{ $errors->first('option2') }}
            </p>
        @endif
    </div>
    <div class="col-xs-12 form-group">
        {!! Form::label('option3', 'Option #3', ['class' => 'control-label']) !!}
        {!! Form::text('option3', old('option3'), ['class' => 'form-control ', 'placeholder' => '']) !!}
        <p class="help-block"></p>
        @if($errors->has('option3'))
            <p class="help-block">
                {{ $errors->first('option3') }}
            </p>
        @endif
    </div>
    <div class="col-xs-12 form-group">
        {!! Form::label('option4', 'Option #4', ['class' => 'control-label']) !!}
        {!! Form::text('option4', old('option4'), ['class' => 'form-control ', 'placeholder' => '']) !!}
        <p class="help-block"></p>
        @if($errors->has('option4'))
            <p class="help-block">
                {{ $errors->first('option4') }}
            </p>
        @endif
    </div>
    <div class="col-xs-12 form-group">
        {!! Form::label('option5', 'Option #5', ['class' => 'control-label']) !!}
        {!! Form::text('option5', old('option5'), ['class' => 'form-control ', 'placeholder' => '']) !!}
        <p class="help-block"></p>
        @if($errors->has('option5'))
            <p class="help-block">
                {{ $errors->first('option5') }}
            </p>
        @endif
    </div>
    <div class="col-xs-12 form-group">
        {!! Form::label('correct', 'Correct', ['class' => 'control-label']) !!}
        {!! Form::select('correct', $correct_options, old('correct'), ['class' => 'form-control']) !!}
        <p class="help-block"></p>
        @if($errors->has('correct'))
            <p class="help-block">
                {{ $errors->first('correct') }}
            </p>
        @endif
    </div>
    <div class="col-xs-12 form-group">
        {!! Form::label('answer_explanation', 'Answer explanation*', ['class' => 'control-label']) !!}
        {!! Form::textarea('answer_explanation', old('answer_explanation'), ['class' => 'form-control ', 'placeholder' => '']) !!}
        <p class="help-block"></p>
        @if($errors->has('answer_explanation'))
            <p class="help-block">
                {{ $errors->first('answer_explanation') }}
            </p>
        @endif
    </div>
    {!! Form::submit(trans('quickadmin.save'), ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
  </div>

  </div>
</div>

</div>
</div>
</div>
@stop
