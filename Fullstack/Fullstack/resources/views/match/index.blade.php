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

                <td> <a href="{{route('Match.edit', $match->id ) }}" class="btn btn-primary"> Edit </a>
                     <a data-target="#delete{{$match->id}}" href="#" class="btn btn-danger" data-toggle="modal" > Delete</a>
                </td>

                <!-- Modal delete -->
                <form action="{{route('Match.destroy', $match->id )}}" method="post">
                    @method('delete')
                    @csrf


                    <div class="modal fade" id="delete{{$match->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">delete Match</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    voulez vous vraiment delete  ce Match ?
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
