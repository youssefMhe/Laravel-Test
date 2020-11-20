@extends('home')

@section('contenu')
    <br>
    @if(session('message'))
        <div class="alert-success">
            {{session('message')}}
        </div>
    @endif
    <br>


    <h1 class="font-weight-bold">Liste des Matches </h1>

    <table class="table table-striped table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Score</th>
            <th scope="col"> Equipe locaux</th>
            <th scope="col"> Equipe visiteurs</th>
            <th scope="col">created at</th>
            <th scope="col">update at </th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach($all as $match)
            <tr>
                <th scope="row">{{$match->id}}</th>
                <td>{{$match->score}}</td>

                @foreach(\App\Models\Equipe::all() as $e)
                    @if($e->id ==$match->equipe_locaux_id )
                        <td>{{$e->nom}}   </td>
                    @endif
                @endforeach()
                @foreach(\App\Models\Equipe::all() as $e)
                    @if($e->id ==$match->equipe_visiteurs_id )
                        <td>{{$e->nom}}   </td>
                    @endif
                @endforeach()
                <td>{{$match->created_at}}</td>
                <td>{{$match->updated_at}}</td>
                <td>@fat</td>
            </tr>
        @endforeach

        </tbody>
    </table>
    {{ $all->links('pagination::bootstrap-4') }}

@endsection
