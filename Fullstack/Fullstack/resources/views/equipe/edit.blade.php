@extends('home')

@section('contenu')


    <h2 class="font-weight-bold">Modifier l Equipe {{\App\Models\Equipe::find($id)->nom}} </h2>

    <div class="row">
        <div class="col-md-5">
            @if(count($errors))
                <div class="alert-danger">
                    <ul>
                        @foreach($errors->all() as $m)
                            <li> {{$m}} </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

    </div>

    <form method="post" action="{{route('Equipe.update',$id)}}">
        @csrf
        @method('put')
    <div class="form-group"  >
        <label for="exampleInputPassword1">Nom de l'equipe</label>
        <input type="text" name="nom" class="form-control" id="exampleInputPassword1" placeholder="Nom" value="{{\App\Models\Equipe::find($id)->nom}}">
    </div>




    <input type="submit" value="update" class="btn btn-primary"/>
    </form>

@endsection
