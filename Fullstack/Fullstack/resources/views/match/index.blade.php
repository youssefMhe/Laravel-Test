@extends('home')

@section('contenu')

    <h1 class="font-weight-bold">Liste des Matches </h1>

    <table class="table table-striped table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Score</th>
            <th scope="col">id equipe locaux</th>
            <th scope="col">id equipe visiteurs</th>
            <th scope="col">created at</th>
            <th scope="col">update at </th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach(\App\Models\Match::all() as $match)
            <tr>
                <th scope="row">{{$match->id}}</th>
                <td>{{$match->score}}</td>
                <td>{{$match->equipe_locaux_id}}</td>
                <td>{{$match->equipe_visiteurs_id }}</td>
                <td>{{$match->created_at}}</td>
                <td>{{$match->updated_at}}</td>
                <td>@fat</td>
            </tr>
        @endforeach

        </tbody>
    </table>

@endsection
