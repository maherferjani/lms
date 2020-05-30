
@extends('layouts.master')
@section('content')
<div class="mdk-header-layout__content">

    <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
        <div class="mdk-drawer-layout__content page">



            <div class="container-fluid page__heading-container">
                <div class="page__heading d-flex align-items-center justify-content-between">
                    <h3 class="m-0"></h3>
                </div>
            </div>


           <div class="row">
               <div class="col-md-8 offset-md-2 ">
                 <div class="card">
                     <div class="card-header">
                       <i class="fa fa-align-justify"></i> User {{ $user->name }}</div>
                     <div class="card-body">
                         <h4>Name: {{ $user->name }}</h4>
                         <h4>E-mail: {{ $user->email }}</h4>
                         <br/>
                         <a href="{{ url()->previous() }}" class="btn btn-block btn-primary">{{ __('Return') }}</a>
                     </div>
                 </div>
               </div>
           </div>

        </div>
    </div>
</div>


@endsection
