@extends('layouts.master')
@section('content')
<div class="mdk-header-layout__content">
    <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
        <div class="mdk-drawer-layout__content page">
            <div class="container-fluid page__heading-container">
                <div class="page__heading d-flex align-items-center justify-content-between">
                    <h3 class="m-0">Admins Liste</h3>
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
                        <th>Roles</th>
                        <th></th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @if($admins->count() > 0)
                        @foreach($admins as $user)
                          <tr>
                            <th>{{ $user->id }}</th>
                            <td><b>{{ $user->name }}</b></td>
                            <td>{{ $user->email }}</td>
                            <td>
                              @foreach($user->roles as $role)
                                <span class="badge badge-warning p-2" style=" font-size: 0.75rem">{{$role->name}}</span>
                              @endforeach
                            </td>
                            <td>
                              <a href="{{ url('/users/' . $user->id) }}" class="btn btn-sm btn-block btn-primary">View</a>
                            </td>
                            <td>
                              <a href="{{ url('/users/' . $user->id . '/edit') }}" class="btn btn-sm btn-block btn-success">Edit</a>
                            </td>
                            <td>
                              @if( $you->id !== $user->id )
                              <form action="{{ route('users.destroy', $user->id ) }}" method="POST">
                                  @method('DELETE')
                                  @csrf
                                  <button class="btn btn-block btn-sm btn-danger">Delete</button>
                              </form>
                              @endif
                            </td>
                          </tr>
                        @endforeach
                      @else
                      <tr><td colspan="9" style="text-align:center">There is no admins</td></tr>
                      @endif
                    </tbody>
                  </table>
              </div>
            </div>
            <div class="container-fluid page__heading-container">
                <div class="page__heading d-flex align-items-center justify-content-between">
                    <h3 class="m-0">Formateurs Liste</h3>
                    <a href="{{ route('users.create')}}" class="btn btn-primary">Ajouter</a>
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
                      <th>Roles</th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($formateurs->count() > 1)
                      @foreach($formateurs as $user)
                        @if(!$admins->contains($user))
                        <tr>
                          <th>{{ $user->id }}</th>
                          <td><b>{{ $user->name }}</b></td>
                          <td>{{ $user->email }}</td>
                          <td>
                            @foreach($user->roles as $role)
                              <span class="badge badge-warning p-2" style=" font-size: 0.75rem">{{$role->name}}</span>
                            @endforeach
                          </td>
                          <td>
                            <a href="{{ url('/users/' . $user->id) }}" class="btn btn-sm btn-block btn-primary">View</a>
                          </td>
                          <td>
                            <a href="{{ url('/users/' . $user->id . '/edit') }}" class="btn btn-sm btn-block btn-success">Edit</a>
                          </td>
                          <td>
                            @if( $you->id !== $user->id )
                            <form action="{{ route('users.destroy', $user->id ) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-block btn-sm btn-danger">Delete</button>
                            </form>
                            @endif
                          </td>
                        </tr>
                        @endif
                      @endforeach
                    @else
                    <tr><td colspan="9" style="text-align:center">There is no for</td></tr>
                    @endif
                  </tbody>
                </table>
              </div>
            </div>
            <div class="container-fluid page__heading-container">
                <div class="page__heading d-flex align-items-center justify-content-between">
                    <h3 class="m-0">Apprenants Liste</h3>
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
                    <th>Roles</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($users as $user)
                  @if(!$admins->contains($user) && !$formateurs->contains($user))
                    <tr>
                      <th>{{ $user->id }}</th>
                      <td><b>{{ $user->name }}</b></td>
                      <td>{{ $user->email }}</td>
                      <td>
                        @foreach($user->roles as $role)
                          <span class="badge badge-warning p-2" style=" font-size: 0.75rem">{{$role->name}}</span>
                        @endforeach
                      </td>
                      <td>
                        <a href="{{ url('/users/' . $user->id) }}" class="btn btn-sm btn-block btn-primary">View</a>
                      </td>
                      <td>
                        <a href="{{ url('/users/' . $user->id . '/edit') }}" class="btn btn-sm btn-block btn-success">Edit</a>
                      </td>
                      <td>
                        @if( $you->id !== $user->id && $user->test->count() == 0 )
                        <form action="{{ route('users.destroy', $user->id ) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-block btn-sm btn-danger">Delete</button>
                        </form>
                        @endif
                      </td>
                    </tr>
                    @endif
                  @endforeach
                </tbody>
              </table>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
