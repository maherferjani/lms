@extends('layouts.master')

@section('content')
<div class="mdk-header-layout__content">

    <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
        <div class="mdk-drawer-layout__content page">



            <div class="container-fluid page__heading-container">
                <div class="page__heading d-flex align-items-center justify-content-between">
                    <h3 class="m-0">Qcm Liste</h3>
                    <a href="{{ route('qcms.create')}}" class="btn btn-primary">Ajouter</a>
                </div>
            </div>




            <div class="container-fluid page__container">
                <div class="card">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="text-align:center;">#</th>
                        <th>Formation</th>
                        <th>@lang('quickadmin.qcms.fields.title')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @if (count($qcms) > 0)
                        @foreach ($qcms as $qcm)
                            <tr data-entry-id="{{ $qcm->id }}">
                                <td>{{ $qcm->id }}</td>
                                <td>{{ $qcm->formation->nom }}</td>
                                <td>{{ $qcm->title }}</td>
                                <td>
                                    <a href="{{ route('qcms.show',[$qcm->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.view')</a>
                                    <a href="{{ route('qcms.edit',[$qcm->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.edit')</a>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.are_you_sure")."');",
                                        'route' => ['qcms.destroy', $qcm->id])) !!}
                                    {!! Form::submit(trans('quickadmin.delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3">@lang('quickadmin.no_entries_in_table')</td>
                        </tr>
                    @endif
                  </table>

            </div>
        </div>

    </div>
  </div>
  </div>
@stop
