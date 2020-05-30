@extends('layouts.master')
@section('content')
<div class="mdk-header-layout__content">
    <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
        <div class="mdk-drawer-layout__content page">
            <div class="container-fluid page__heading-container">
                <div class="page__heading d-flex align-items-center justify-content-between">
                    <h3 class="m-0">Create Qcm</h3>
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
                        {!! Form::open(['method' => 'POST', 'route' => ['qcms.store']]) !!}

                        <div class="form-group">
                        {!! Form::label('title', 'Title*', ['class' => 'control-label']) !!}
                        {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('title'))
                            <p class="help-block">
                                {{ $errors->first('title') }}
                            </p>
                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="formation">Formation</label><br />
                                        <select id="category" class="custom-select " name="formation_id">
                                            @foreach ($formations as $item )
                                                <option value="{{$item->id}}"> {{$item->nom}}</option>
                                            @endforeach
                                        </select>
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
