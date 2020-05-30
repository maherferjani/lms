
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
                        <form action="{{ route('formation.store') }}" method="post"  enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="fname">Titre</label>
                                <input id="fname" type="text" name="nom" class="form-control" placeholder="Title goes here" >
                            </div>

                            <div class="form-group">
                                <label for="desc">Description</label>
                                <textarea id="desc" rows="4" name="description" class="form-control" placeholder="Please enter a description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label><br />
                                <select id="category" class="custom-select w-auto" name="categorie">
                                    @foreach ($categories as $item )
                                        <option value="{{$item->id}}"> {{$item->nom}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="fname">Prix</label>
                                <input id="fname" type="number" name="prix" class="form-control" placeholder="Title goes here">
                            </div>
                            <div class="form-group">
                                <label for="subscribe">Etat</label><br>
                                <div class="custom-control custom-checkbox-toggle custom-control-inline mr-1">
                                    <input checked="" type="checkbox"  id="subscribe" name="etat" class="custom-control-input">
                                    <label class="custom-control-label" for="subscribe">Yes</label>
                                </div>
                                <label for="subscribe" class="mb-0">Oui</label>
                            </div>

                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control">
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
