@extends('layouts.master')
@section('content')
<div class="mdk-header-layout__content">
    <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
        <div class="mdk-drawer-layout__content page">
            <div class="container-fluid page__heading-container">
                <div class="page__heading d-flex align-items-center justify-content-between">
                    <h3 class="m-0">Cours Liste</h3>
                    <a href="{{ route('cour.create')}}" class="btn btn-primary">Ajouter</a>
                </div>
            </div>
            <div class="container-fluid page__container">
                <div class="card">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Formation</th>
                            <th scope="col">Formateur</th>
                            <th scope="col">Modification</th>
                            <th scope="col">Supression</th>
                          </tr>
                        </thead>
                        <tbody>
                         @foreach ($cours as $item)
                         <tr>
                         <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->titre }}</td>
                            <td>{{ $item->formation->nom }}</td>
                            <td>{{ $item->formation->formateur->name }}</td>


                            <td>
							@if($item->formation->formateur->name == Auth::user()->name  || Auth::user()->hasRole('admin'))
							<a href="{{ route('cour.edit', $item)}}" class="btn btn-primary">Modifier</a>
							@endif
							</td>
                            <td>
							@if($item->formation->formateur->name == Auth::user()->name  || Auth::user()->hasRole('admin'))
                                <form action="{{route('cour.destroy', $item)}}" method="post" >
                                       @csrf
                                       @method('DELETE')
                                       <button type="submit" class="btn btn-primary">Supprimer</button>

                                </form>
								@endif
                            </td>

                          </tr>
                         @endforeach

                        </tbody>
                      </table>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
