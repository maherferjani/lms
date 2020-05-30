@extends('layouts.master')
@section('content')
<div class="mdk-header-layout__content">
    <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
        <div class="mdk-drawer-layout__content page">
            <div class="container-fluid page__heading-container">
                <div class="page__heading d-flex align-items-center justify-content-between">
                    <h3 class="m-0">Formateur Liste</h3>
                    <a href="{{ route('admin.formateur.create')}}" class="btn btn-primary">Ajouter</a>
                </div>
            </div>
            <div class="container-fluid page__container">
                <div class="card">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Email</th>
                            <th scope="col">Modification</th>
                            <th scope="col">Suppression</th>

                          </tr>
                        </thead>
                        <tbody>
                         @foreach ($formateurs as $item)
                         <tr>
                         <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td><a href="{{ route('admin.cour.edit', $item)}}" class="btn btn-primary">Modifier</a></td>
                            <td>

                                <form action="{{route('admin.cour.destroy', $item)}}" method="post" >
                                       @csrf
                                       @method('DELETE')
                                       <button type="submit" class="btn btn-primary">Supprimer</button>

                                </form>
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
