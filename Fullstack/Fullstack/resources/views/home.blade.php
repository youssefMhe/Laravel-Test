@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <nav class="navbar navbar-light bg-light">
                            <a class="navbar-brand" href="#">Welcome You are logged in! </a>
                        </nav>

                        <div class="dropdown col-md-5" >
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Equipe
                            </button>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenu">
                                <a href="{{route('Equipe.index')}}" class="dropdown-item"> Show</a>
                                <a href="{{route('Equipe.create')}}"class="dropdown-item" type="button">Add</a>
                            </div>

                        </div>
                        <br>

                        <div class="dropdown col-md-5">
                         <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Match
                         </button>
                             <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                  <a href="{{route('Match.index')}}" class="dropdown-item"> Show </a>
                                  <a href="{{route('Match.create')}}" class="dropdown-item" type="button">Add</a>

                             </div>
                        </div>

                </div>
                @yield('contenu')

            </div>
        </div>
    </div>
</div>
@endsection
