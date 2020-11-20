@extends('home')

@section('contenu')


    <h2 class="font-weight-bold">Modifier le match ?  </h2>

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

    <form method="post" action="{{route('Match.update', $id )}}">
        @csrf
        @method('put')
    <div class="form-group"  >
        <label for="exampleInputPassword1">score</label>
        <input type="text" name="score" class="form-control" id="exampleInputPassword1" placeholder="score" value="{{\App\Models\Match::find($id)->score}}">
    </div>

        <div class="col-6">
            <label  for="inlineFormInput">Equipe local </label>

            <select name="equipe_locaux_id" class="form-control mb-2">
                @foreach(\App\Models\Equipe::all() as $e)
                    @if($e->id == \App\Models\Match::find($id)->equipe_locaux_id )
                        <td>{{$e->nom}}   </td>
                        <option  class="dropdown-item" value="{{$e->id}}" > {{$e->nom}}</option>
                    @endif
                @endforeach()
                @foreach(\App\Models\Equipe::all() as $e)
                    <option  class="dropdown-item" value="{{$e->id}}" > {{$e->nom}} - </option>
                @endforeach()
            </select>
        </div>

        <div class="col-6">
            <label  for="inlineFormInput">Equipe visiteur </label>

            <select  name="equipe_visiteurs_id" class="form-control mb-2">

                @foreach(\App\Models\Equipe::all() as $e)
                    @if($e->id == \App\Models\Match::find($id)->equipe_visiteurs_id )
                        <td>{{$e->nom}}   </td>
                        <option  class="dropdown-item" value="{{$e->id}}" > {{$e->nom}}</option>
                    @endif
                @endforeach()

                @foreach(\App\Models\Equipe::all() as $e)
                    <option  class="dropdown-item" value="{{$e->id}}" > {{$e->nom}}</option>
                @endforeach()
            </select>
        </div>



    <input type="submit" value="update" class="btn btn-primary"/>
    </form>

@endsection
