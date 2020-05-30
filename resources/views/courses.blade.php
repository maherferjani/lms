
@extends('layouts.master')

@section('content')
<div class="mdk-header-layout__content page" style="padding-top: 10px;">
    <div class="container page__container mt-4 mb-4">
                    <div class="row" style="height: 400px;">
                        <div class="col-md-4 ps" data-perfect-scrollbar="">
                            <div class="card clear-shadow border">
                                <div class="card-body ">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <strong>{{$lesson->titre}}</strong>
                                    </div>
                                </div>
                            </div>
                            <ul class="list-group list-group-fit">

                                @foreach($formation->cours as $indexKey => $cour)
                                <li class="list-group-item {{$cour->id == $lesson->id ? 'active':''}}">
                                    <div class="media">
                                        <div class="media-left">
                                            <div class="{{$cour->id == $lesson->id ? 'text-white':'text-muted'}}">{{$indexKey + 1}} . </div>
                                        </div>
                                        <div class="media-body">
                                            <a href="{{ route('getCourse', [$formation->id, $cour->id])}}" class="{{$cour->id == $lesson->id ? 'text-white':'text-muted'}}">{{ $cour->titre }}</a>
                                        </div>

                                    </div>
                                </li>
                               @endforeach
                               @if($formation->qcm->count() > 0)
                                @if(App\Test::where([['user_id', '=', Auth::user()->id],['qcm_id', '=', $formation->qcm[0]->id]])->get()->count() > 0)
                                <?php $test = App\Test::where([['user_id', '=', Auth::user()->id],['qcm_id', '=', $formation->qcm[0]->id]])->get()[0]; ?>
                                <li class="list-group-item">
                                    <div class="media">
                                        <div class="media-left">
                                            <div class="text-muted">Test Score  </div>
                                        </div>
                                        <div class="media-body">
                                            <div class="text-muted text-right">
                                              <a href="{{ route('myresultshow', [$test->id])}}" class="text-muted text-right">
                                                {{$test->result}}
                                              </a>
                                            </div>
                                        </div>

                                    </div>
                                </li>
                                @else
                               <li class="list-group-item">
                                   <div class="media">
                                       <div class="media-left">
                                           <div class="text-muted"></div>
                                       </div>
                                       <div class="media-body">
                                           <a href="{{ route('test', [$formation->id])}}" class="text-muted text-right">Take Test</a>
                                       </div>

                                   </div>
                               </li>
                               @endif
                               @endif
                            </ul>

                        <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
                        <div class="col-md-8">
<?php
$typ = explode("/", mime_content_type('videos/'.$lesson->file))[0];
?>
                            <div class="mb-4 card" style="max-height:400px;">
							  @switch($typ)
    @case('application')
	<iframe style="border:0px" src="{{asset('videos/'.$lesson->file)}}" frameborder="1" scrolling="auto" height="400" width="100%" ></iframe>
        @break

    @case('image')
        <img src="{{asset('videos/'.$lesson->file)}}" width="100%" height="400px"/>
        @break

    @default
        <link type="text/css" href="{{ asset('assets/css/plyr.css') }}" rel="stylesheet">
                              <video height="400" width="90%" controls id="player">
                                  <source src="{{asset('videos/'.$lesson->file)}}" type="video/mp4"/>
                                  Your browser does not support the video tag.
                              </video>
                              <script src="{{asset('assets/js/plyr.js')}}"></script>
                              <script>
                                const player = new Plyr('#player');
                              </script>
@endswitch
                            </div>

                        </div>
                    </div>
                </div>
    <div class="container page__container">
        <div class="row">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header card-header-tabs-basic nav border-top" role="tablist">
                        <a href="#overview" class="active" data-toggle="tab" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                        <a href="#comments" data-toggle="tab" role="tab" aria-selected="false" class="">Comments</a>
                        <a href="#assets" data-toggle="tab" role="tab" aria-selected="false" class="">Assets</a>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="overview">
                            <div class="card-body" id="course_content">
                                <p>
                                  {{$lesson->description}}
                                </p>
                            </div>
                        </div>

                        <div class="tab-pane overflow-auto" id="comments" style="height: 800px;">
                            <div style="padding:20px;">
                                <form action="{{  route('cour.commentaire.store', $cour->id) }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="comment">Publier votre commentaire</label>
                                        <textarea style="resize: none;" name="commentaire" id="comment" class="form-control"  rows="5"></textarea>
                                    </div>
                                    <button class="btn btn-success">publier</button>
                                </form>
                            </div>
                            <hr>

                            @foreach($cour->commentaires as $comment)
                            <div class="media" style="padding: 20px;">
                                <img class="mr-3" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2264%22%20height%3D%2264%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2064%2064%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_171fba23b33%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_171fba23b33%22%3E%3Crect%20width%3D%2264%22%20height%3D%2264%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2213.546875%22%20y%3D%2236.5%22%3E64x64%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Generic placeholder image">
                                <div class="media-body">
                                  <h5 class="mt-0">{{ $comment->user->name  }}</h5>
                                  {{ $comment->commentaire }}

                                  @if($comment->reponse)
                                  <div class="media mt-4">
                                    <a class="pr-3" href="#">
                                      <img src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2264%22%20height%3D%2264%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2064%2064%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_171fba23b33%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_171fba23b33%22%3E%3Crect%20width%3D%2264%22%20height%3D%2264%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2213.546875%22%20y%3D%2236.5%22%3E64x64%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Generic placeholder image">
                                    </a>
                                    <div class="media-body">
                                      <h5 class="mt-0">{{ $cour->formation->formateur->name }}</h5>
                                      Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                    </div>
                                  </div>
                                  @endif
                                </div>
                            </div>

                            <hr>

                            @endforeach



                        </div>
                        <div class="tab-pane" id="assets">
						<div class="card-body" id="course_content">
                                <p>
                            		 <a href="{{asset('videos/'.$lesson->file)}}"  download="{{$lesson->file}}" class="btn btn-warning mt-2" >Download Resource </a>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header card-header-large bg-light d-flex align-items-center">
                        <div class="flex">
                            <h4 class="card-header__title">My Progress</h4>
                            <div class="card-subtitle text-muted">Current lesson progress</div>
                        </div>
                        <div class="ml-auto">
                            @if(!Auth::user()->cours->contains($lesson))
                                <form action="{{ route('cour.complete', $lesson->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="next" value="{{$next}}">
                                    <button class="btn btn-light text-muted" type="submit"><i class="material-icons icon-16pt">check_circle</i> Complete</button>

                                </form>
                            @endif
                        </div>
                    </div>
                    <div class="p-2 px-4 d-flex align-items-center">
                        <div class="progress" style="width:100%;height:6px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: {{round(count($formation->cours->intersect(Auth::user()->cours))/count($formation->cours)*100)}}%;" aria-valuenow="{{round(count($formation->cours->intersect(Auth::user()->cours))/count($formation->cours)*100)}}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="ml-2 text-primary">
                            {{round(count($formation->cours->intersect(Auth::user()->cours))/count($formation->cours)*100)}}%
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="media align-items-center">
                            <div class="media-body">
                                <div class="card-title mb-0"><a href="student-profile.html" class="text-body"><strong>{{$formation->formateur->name}}</strong></a></div>
                                <p class="text-muted mb-0">Author</p>
                            </div>
                            <div class="media-right">
                                <a href="" class="btn btn-facebook btn-sm"><i class="fab fa-facebook"></i></a>
                                <a href="" class="btn btn-twitter btn-sm"><i class="fab fa-twitter"></i></a>
                                <a href="" class="btn btn-light btn-sm"><i class="fab fa-github"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        Having over 12 years exp. Adrian is one of the lead UI designers in our team.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
