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
            <div class="container-fluid page__container">
                <div class="card">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Commntaire</th>
                            <th scope="col">Utilisateur</th>
                            <th scope="col">Repondre</th>
                            <th scope="col">Supression</th>
                          </tr>
                        </thead>
                        <tbody>
                         @foreach ($commentaires as $item)
                         <tr>
                         <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->commentaire }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>


                            <form action="{{ route('commentaire.reponse', $item->id) }}" method="POST">
                                       @csrf
                                    <textarea class="form-control" id="reponse" name="reponse" cols="30" rows="5" style="resize: none;"></textarea>
                                    <button type="submit"  class="btn btn-success">Repondre</button>
                                   </form>

                            </td>


                            <td>

                                <form action="{{route('commentaire.supprimer', $item->id)}}" method="post" >
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
