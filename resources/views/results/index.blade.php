@extends('layouts.master')

@section('content')
<div class="mdk-header-layout__content">

    <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
        <div class="mdk-drawer-layout__content page">



            <div class="container-fluid page__heading-container">
                <div class="page__heading d-flex align-items-center justify-content-between">
                    <h3 class="m-0">Results Liste</h3>
                </div>
            </div>




            <div class="container-fluid page__container">
                <div class="card">
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th>@lang('quickadmin.results.fields.user')</th>
                    <th>Qcm</th>
                    <th>Date</th>
                        <th>Result</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @if (count($results) > 0)
                        @foreach ($results as $result)
                            <tr>
                                <td>{{ $result->user->name}} ({{ $result->user->email }})</td>
                                <td>{{ App\Qcm::find($result->qcm_id)->title }}</td>
                                <td>{{ $result->created_at }}</td>
                                <td>{{ $result->result }}/100</td>
                                <td>
                                    <a href="{{ route('results.show',[$result->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.view')</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">@lang('quickadmin.no_entries_in_table')</td>
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
