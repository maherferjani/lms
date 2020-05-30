@extends('layouts.master')

@section('content')
    <div class="mdk-header-layout__content">
        <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
            <div class="mdk-drawer-layout__content page">
                <div class="container-fluid page__heading-container">
                    <div class="page__heading d-flex align-items-center justify-content-between">
                        <h3 class="m-0">@lang('quickadmin.qcms.title')</h3>
                    </div>
                </div>
                <div class="container-fluid page__container">
                    <div class="card">
                        <div class="card-body">
                          <table class="table table-bordered table-striped">
                              <tr><th>@lang('quickadmin.qcms.fields.title')</th>
                          <td>{{ $qcm->title }}</td></tr>
                          </table>
                          <a href="{{ route('qcms.index') }}" class="btn btn-primary">@lang('quickadmin.back_to_list')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
