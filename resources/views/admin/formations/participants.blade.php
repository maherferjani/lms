@extends('layouts.master')
@section('content')
<div class="mdk-header-layout__content">
    <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
        <div class="mdk-drawer-layout__content page">
            <div class="container-fluid page__heading-container">
                <div class="page__heading d-flex align-items-center justify-content-between">
                    <h3 class="m-0">Participants Liste</h3>
                </div>
            </div>
            <div class="container-fluid page__container">
              <div class="card">
                  <table class="table">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Username</th>
                        <th>E-mail</th>
                        <th>Note</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if($users->count() > 0)
                        @foreach($users as $user)
                          <tr>
                            <th>{{ $user->id }}</th>
                            <td><b>{{ $user->name }}</b></td>
                            <td>{{ $user->email }}</td>
                            <td>
                              {{$formation->qcm->count() > 0 && App\Test::where([['user_id', '=', $user->id],['qcm_id', '=', $formation->qcm[0]->id]])->get()->count() > 0 ? App\Test::where([['user_id', '=', $user->id],['qcm_id', '=', $formation->qcm[0]->id]])->get()[0]->result : '--'}}
                            </td>
                          </tr>
                        @endforeach
                      @else
                      <tr><td colspan="9" style="text-align:center">There is no participants</td></tr>
                      @endif
                    </tbody>
                  </table>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
