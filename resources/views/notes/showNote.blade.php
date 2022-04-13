@extends('layout')

@section('content')
    <div class="container">
        <div>
            <div class="card mt-3" style="width: 50rem;">
                <img class="card-img-top" src="{{ $note->photo }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $note->type }}</h5>
                    <p class="card-text">{{ $note->content }}</p>
                    <p>Created at: {{ $note->created_at->diffForHumans() }}</p>
                    <p>Updated at: {{ $note->updated_at->diffForHumans() }}</p>
                    <a href="#" class="btn btn-success">Home</a>
                </div>
            </div>
        </div>
        <div class="btn-control">
            <a href="" class="button"> <button type="button" class="btn btn-secondary">Edit</button></a>
            <a>
                <form action="{{ route('note.destroy', $note->id) }}" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </a>
            <a href="{{ route('Notes') }}" class="button"> <button type="button"
                    class="btn btn-primary">Back</button></a>
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
