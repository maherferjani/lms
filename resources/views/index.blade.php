@extends('layouts.master')
@section('content')
<div class="mdk-header-layout__content page">
    <div class="home-banner text-white mb-4">
        <div class="container-fluid page__container">
            <h1 class="display-4 bold" data-aos="fade-up" data-aos-duration="800">Everything you need to LEARN</h1>
            <p class="lead mb-5" data-aos="fade-up" data-aos-duration="1000">Get your first Job as a UI/UX Designer</p>
            <div data-aos="fade-down" data-aos-duration="400" data-aos-delay="400" data-offset="-100">
                <a class="btn btn-light btn-lg mr-1" href="#cours">Browse Lessons</a>
            </div>
        </div>
    </div>
    <div class="container-fluid page__container mb-4">
        <h2 class="bold m-4 text-center p-4">Recent Formations</h2>
        <div class="row">
            @foreach($formations as $item)
              <div class="col-md-4">
                  <div class="card card__course" data-aos="fade-up" data-offset="-100">
                      <div class="card-header card-header-large card-header-dark bg-dark d-flex justify-content-center">
                          <a class="card-header__title  justify-content-center align-self-center d-flex flex-column"  href="{{route('getFormation',$item->id)}}">
                              <span><img src="{{ asset('images/'.$item->image)}}" class="mb-1" style="width:34px;" alt="logo"></span>
                              <span class="course__subtitle">{{ $item->nom }}</span>
                          </a>
                      </div>
                      <div class="p-3">
                        <div class="mb-2">
                              <span class="mr-2">
                                  <a href="#" class="rating-link active"><i class="material-icons icon-16pt">star</i></a>
                                  <a href="#" class="rating-link active"><i class="material-icons icon-16pt">star</i></a>
                                  <a href="#" class="rating-link active"><i class="material-icons icon-16pt">star</i></a>
                                  <a href="#" class="rating-link active"><i class="material-icons icon-16pt">star</i></a>
                                  <a href="#" class="rating-link active"><i class="material-icons icon-16pt">star</i></a>
                              </span>
                              <strong>5</strong><br>
                              <small class="text-muted">{{$item->cours->count()}} cours</small>
                          </div>
                          <div class="d-flex align-items-center">
                              <strong class="h4 m-0">${{$item->prix}}</strong>
                              <a href="{{route('getFormation',$item->id)}}" class="btn btn-primary ml-auto">View</a>
                          </div>
                      </div>
                  </div>
              </div>
            @endforeach
        </div>
    </div>
    <div class="container-fluid page__container mb-4" id="cours">
        <h2 class="bold m-4 text-center p-4">Recent Cours</h2>
        <div class="row">
            @foreach(App\Cour::latest()->take(12)->get() as $item)
            <div class="col-md-4">
              <div class="card cour">
                  <div class="card-header card-header-large bg-white">
                      <h4 class="card-header__title">{{ $item->titre }}</h4>
                  </div>
                  <div class="card-body d-flex align-items-center">
                      <p>{{ $item->description }}</p>
                      <a href="{{route('getCourse',[$item->formation->id,$item->id])}}" class="btn btn-warning ml-auto">View</a>
                  </div>
              </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
