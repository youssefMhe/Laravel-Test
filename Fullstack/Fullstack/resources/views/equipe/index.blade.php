@extends('home')

@section('contenu')
    <br>
    @if(session('message'))
        <div class="alert-success">
            {{session('message')}}
        </div>
    @endif
    <br>

    <h1 class="font-weight-bold">Liste des Equipes </h1>


    <table class="table table-striped table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">created at</th>
            <th scope="col">update at </th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach($all as $equipe)
        <tr>
            <th scope="row">{{$equipe->id}}</th>
            <td>{{$equipe->nom}}</td>
            <td>{{$equipe->created_at}}</td>
            <td>{{$equipe->updated_at}}</td>
            <td>@fat</td>
        </tr>
        @endforeach

        </tbody>
    </table>
    {{ $all->links('pagination::bootstrap-4') }}

@endsection
