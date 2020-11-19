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

                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Equipe
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <button class="dropdown-item" type="button">Add</button>
                                <button class="dropdown-item" type="button">Edit</button>
                                <button class="dropdown-item" type="button">Delet</button>
                            </div>

                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Match
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <button class="dropdown-item" type="button">Add</button>
                                <button class="dropdown-item" type="button">Edit</button>
                                <button class="dropdown-item" type="button">Delet</button>
                            </div>
                        </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
