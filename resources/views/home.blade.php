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

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
            <div class="card" style="width: 18rem;">

                <div class="card-body">
                    <h5 class="card-title">Create New Note</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <a href="{{ route('note.create') }}" class="btn btn-primary">Create</a>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    * {
        font-size: 16px;
    }

    h2 {
        margin: 20px;
    }

    .list-group-item {
        margin: 20px 10px;
        padding: 5px;
    }

    .button {
        margin: 20px 20px;

    }

    .btn-control {
        margin-top: 10px;
        margin-bottom: 20px;
    }

</style>
