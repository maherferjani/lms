
@extends('layouts.master')
@section('content')
<div class="mdk-header-layout__content">

    <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
        <div class="mdk-drawer-layout__content page">



            <div class="container-fluid page__heading-container">
                <div class="page__heading d-flex align-items-center justify-content-between">
                    <h3 class="m-0">Tables</h3>
                </div>
            </div>


           <div class="row">
               <div class="col-md-8 offset-md-2 ">
                <div class="card">
                    <div class="card-form__body card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form method="POST" action="/users/{{ $user->id }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" type="text" placeholder="{{ __('Name') }}" name="name" value="{{ $user->name }}" required autofocus>
                            </div>
                            <div class="form-group">
                                <label>E-Mail</label>
                                <input class="form-control" type="text" placeholder="{{ __('E-Mail Address') }}" name="email" value="{{ $user->email }}" required>
                            </div>
                            @if(Auth::user()->hasRole('admin') && $you->id !== $user->id)
                            <div class="form-group">
                              <label>Role</label>
                              <select class="form-control" name="role">
                                <option value="admin" {{$user->hasRole('admin') ? 'selected':''}}>Admin</option>
                                <option value="formateur" {{$user->hasRole('formateur') && $user->roles()->count() == 2 ? 'selected':''}}>Formateur</option>
                                <option value="user" {{$user->roles()->count() == 1  ? 'selected':''}}>Apprenant</option>
                              </select>
                            </div>
                            @endif
                            <button class="btn btn-block btn-success" type="submit">{{ __('Save') }}</button>
                            <a href="{{ url()->previous() }}" class="btn btn-block btn-primary">{{ __('Return') }}</a>
                        </form>

                </div>
               </div>
           </div>

        </div>
    </div>
</div>


@endsection
