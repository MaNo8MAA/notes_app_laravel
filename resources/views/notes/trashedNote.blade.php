@extends('layout')

@section('content')
    <div class="container">
        <form action="{{ route('note.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group container m-3">
                <h1 style="padding-top:10px;""> Trashed Notes</h1>
                                     <label for=" exampleForControlInput" class="m-2"> Type :</label>
                    <select class="form-control" name="type">
                        @foreach ($type as $item)
                            <option value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                    </select>
            </div>

            <div class="container m-3" style="with:40px">
                <label for="exampleForControlInput" class="m-2"> Photo :</label>
                <input type="file" name="photo" class="form-control">
                </input>
            </div>

            <div class="container m-3" style="with:40px">
                <label for="exampleForControlInput" class="m-2"> Content :</label>
                <textarea name="content" class="form-control">
                    </textarea>
            </div>


            <div class="btn-control container m-3">
                <a class="button"> <button type="submit" class="btn btn-primary">Restore</button></a>
                <a href="{{ route('note.hardDelete') }}" class="button"> <button type="button"
                        class="btn btn-secondary">HardDelete</button></a>
                <a href="{{ route('Notes') }}" class="button"> <button type="button"
                        class="btn btn-secondary">Back</button></a>

            </div>

        </form>
    </div>
@endsection
<!--class="list-group-item "-->
