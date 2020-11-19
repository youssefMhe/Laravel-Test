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

        @foreach($all as $equ)
        <tr>
            <th scope="row">{{$equ->id}}</th>
            <td>{{$equ->nom}}</td>
            <td>{{$equ->created_at}}</td>
            <td>{{$equ->updated_at}}</td>
            <td>
                <a href="{{route('Equipe.edit', $equ->id)}}" class="btn btn-primary">Edit</a>
                <a data-target="#delete{{$equ->id}}" href="#" class="btn btn-danger" data-toggle="modal" > Delete</a>

            </td>



        <!-- Modal delete -->
        <form action="{{route('Equipe.destroy', $equ->id )}}" method="post">
            @method('delete')
            @csrf


        <div class="modal fade" id="delete{{$equ->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">delete Equipe</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        voulez vous vraiment delete l equipe {{$equ->nom}} ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                </div>
            </div>
        </div>
        </form>

        </tr>


        @endforeach

        </tbody>
    </table>
    {{ $all->links('pagination::bootstrap-4') }}

@endsection
