@extends('layout')

@section('content')
    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group container m-3">
                <h1 style="padding-top:10px;""> Edit The Note</h1>
                                    <label for=" exampleForControlInput" class="m-2"> Type :</label>
                    <label for="" value="{{ $note->type }}"></label>
            </div>
            <div class="container m-3" style="with:40px">
                <label for="exampleForControlInput" class="m-2"> Photo :</label>
                <img src="{{ $note->photo }}" alt="{{ $note->photo }}" width="30px" height="30px">
            </div>
            <div class="container m-3" style="with:40px">
                <label for="exampleForControlInput" class="m-2"> Content :</label>
                <textarea name="content" class="form-control">
                  {{ $note->content }}  </textarea>
            </div>

            <div class="btn-control container m-3">
                <a class="button"> <button type="submit" class="btn btn-primary">Update</button></a>
                <a href="{{ route('Notes') }}" class="button"> <button type="button"
                        class="btn btn-secondary">Back</button></a>

            </div>

        </form>
    </div>
@endsection
