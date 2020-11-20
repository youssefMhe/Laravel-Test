@extends('home')

@section('contenu')


    <h2 class="font-weight-bold">ajouter un Match </h2>

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

    <form method="post" action="{{route('Match.store')}}">
    <div class="form-group"  >
        @csrf

        <div class="col-6">
            <label  for="inlineFormInput">Equipe local </label>

            <select name="equipe_locaux_id" class="form-control mb-2">
                @foreach(\App\Models\Equipe::all() as $e)
                    <option  class="dropdown-item" value="{{$e->id}}" > {{$e->nom}} - </option>
                @endforeach()
            </select>
        </div>
        <div class="col-6">
            <label  for="inlineFormInput">Equipe visiteur </label>

            <select  name="equipe_visiteurs_id" class="form-control mb-2">
                @foreach(\App\Models\Equipe::all() as $e)
                    <option  class="dropdown-item" value="{{$e->id}}" > {{$e->nom}}</option>
                @endforeach()
            </select>
        </div>

        <label for="exampleInputPassword1">Score</label>
        <input type="text" name="score" class="form-control" id="exampleInputPassword1" placeholder="0 - 0" value="{{old('score')}}">
    </div>

    <input type="submit" value="add" class="btn btn-primary"/>
    </form>

@endsection
