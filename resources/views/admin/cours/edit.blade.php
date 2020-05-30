
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
                        <form action="{{ route('cour.update', $cour) }}" method="post"  enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="fname">Titre</label>
                                <input id="fname" type="text" name="titre" class="form-control" value="{{$cour->titre}}" placeholder="Title goes here" >
                            </div>

                            <div class="form-group">
                                <label for="desc">Description</label>
                                <textarea id="desc" rows="4" name="description" class="form-control" placeholder="Please enter a description">{{$cour->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="formation">Formation</label><br />
                                <select id="category" class="custom-select " name="formation">
                                    @foreach ($formations as $item )
                                        <option value="{{$item->id}}" @if($cour->formation->id === $item->id) selected @endif> {{$item->nom}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ordre">Ordre du cour</label>
                                <input type="number" name="ordre" min="1" step="1" value ="{{ $cour->ordre }}" class="form-control" id="ordre">
                            </div>
                            <div class="form-group">
                                <label for="video">Video</label>
                                <input type="file" name="video" id="video" accept="video/*,image/*,application/pdf" class="form-control">
                            </div>
                        </div>
                        <div class="card-body text-center">
                                <button type="submit" class="btn btn-success">Save Changes</button>
                        </div>
                        </form>

                </div>
               </div>
           </div>

        </div>
    </div>
</div>


@endsection
