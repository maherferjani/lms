@extends('layouts.master')
@section('content')
<div class="mdk-header-layout__content">
    <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
        <div class="mdk-drawer-layout__content page">
            <div class="container-fluid page__heading-container">
                <div class="page__heading d-flex align-items-center justify-content-between">
                    <h3 class="m-0">Commentaires Liste</h3>
                </div>
            </div>
            <div class="container-fluid page__container">
                <div class="card">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">User</th>
                            <th scope="col">Cour</th>
							<th scope="col">Contenu</th>
                            <th scope="col">Date</th>
                            <th scope="col">Supression</th>
                          </tr>
                        </thead>
                        <tbody>
                         @foreach ($comments as $item)
                         <tr>
                         <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->cour->titre }}</td>
							<td>{{ $item->commentaire }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                <form action="{{route('comments.destroy', $item->id)}}" method="post" >
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
